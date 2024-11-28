<?php

namespace App\Services;

use App\Models\Blok;
use App\Models\ProgressBlock;
use App\Services\BaseRepository;
use App\Services\Contracts\ProgressBlockContract;
use App\Traits\Uploadable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProgressBlockService extends BaseRepository implements ProgressBlockContract
{
    use Uploadable;
    /**
     * @var
     */
    protected $model, $path = 'uploads/progress_block/';

    public function __construct(ProgressBlock $model)
    {
        $this->model = $model->whereNotNull('id');
    }

    public function paginated(Request $request)
    {
        $progress = $request->input('progress');
        $progressStart =  $progress ? (int)explode(';', $progress)[0] : null;
        $progressEnd = $progress ? (int)explode(';', $progress)[1] : null;
        $perumahanId = $request->input('perumahan');
        $status = $request->input('status');
        $kode = $request->input('kode') ?? null;

        $this->model = $this->model->with('block')->where('perumahan_id', $perumahanId);

        $search = [];

        $limit = $request->input('length');

        $latestData = DB::table('progress_block')
            ->select(DB::raw('MAX(id) as latest_id'), 'blok_id')
            ->where('perumahan_id', $perumahanId)
            ->groupBy('blok_id');

        if (empty($request->input('search'))) {
            $datas = DB::table('bloks')
                ->leftJoinSub($latestData, 'latest', function ($join) {
                    $join->on('bloks.id', '=', 'latest.blok_id');
                })
                ->leftJoin('progress_block', 'progress_block.id', '=', 'latest.latest_id')
                ->where('bloks.perumahan_id', $perumahanId)
                ->when($kode, function ($query) use ($kode) {
                    $query->where('bloks.kode', 'LIKE', "%{$kode}%");
                })->when($status, function ($query) use ($status) {
                    $query->where('status', '=', $status);
                })->when($progressStart, function ($query) use ($progressStart, $progressEnd) {
                    $query->where('progress', '>=', $progressStart)
                        ->where('progress', '<=', $progressEnd);
                })
                ->select('progress_block.*', 'bloks.kode', DB::raw('bloks.id as bloks_id'))
                ->orderBy('bloks.kode', 'asc')->paginate($limit);
        } else {
            $search = $request->input('search');

            $datas = DB::table('bloks')
                ->leftJoinSub($latestData, 'latest', function ($join) {
                    $join->on('bloks.id', '=', 'latest.blok_id');
                })
                ->leftJoin('progress_block', 'progress_block.id', '=', 'latest.latest_id')
                ->where('bloks.perumahan_id', $perumahanId)
                ->when($kode, function ($query) use ($kode) {
                    $query->where('bloks.kode', 'LIKE', "%{$kode}%");
                })->when($status, function ($query) use ($status) {
                    $query->where('status', '=', $status);
                })->when($progressStart, function ($query) use ($progressStart, $progressEnd) {
                    $query->where('progress', '>=', $progressStart)
                        ->where('progress', '<=', $progressEnd);
                })->when($search, function ($query) use ($search) {
                    $query->where('date', 'LIKE', "%{$search}%")
                        ->orWhere('progress', 'LIKE', "%{$search}%")
                        ->orWhere('noted', 'LIKE', "%{$search}%");
                })->select('progress_block.*', 'bloks.kode', DB::raw('bloks.id as bloks_id'))
                ->orderBy('bloks.kode', 'asc')->paginate($limit);
        }

        return [
            'total_page' => $datas->lastPage(),
            'total_data' => $datas->total() ?? 0,
            'code' => 200,
            'data' => $datas,
        ];
    }

    public function progress(array $request)
    {
        $blokId = $request['blok_id'];
        $progress = $this->model->with('block')->where('blok_id', $blokId)->get();

        return $progress;
    }

    public function data(Request $request)
    {
        $datas =  Blok::where('perumahan_id', $request->perumahan)->get();

        $data = [];
        if (!empty($datas)) {
            foreach ($datas as $blok) {
                $nestedData['id'] = $blok->id;
                $nestedData['blok'] = $blok->kode;
                $nestedData['progress'] = $blok?->progress($blok->id);

                $data[] = $nestedData;
            }
        }

        return $data;
    }

    public function findProgres(array $criteria)
    {
        $block = Blok::where(['kode' => $criteria['kode']], ['perumahan_id' => $criteria['perumahan_id']])->first();

        if (empty($block)) {
            return response()->json(['message' => "Data Tidak Ditemukan"], 404);
        }

        $progress = $this->model->where('blok_id', $block->id)->orderBy('date', 'desc')->get();

        return $progress;
    }

    /**
     * Store Data
     */
    public function store(array $request)
    {
        if ($request['id']) {
            $dataNew = [];
            $dataOld = $this->model->find($request['id']);

            $images = [];
            if ($request['images'])
                $images = explode(',', $request['images']);

            $images_names = [];
            if (count($images) > 0) {
                for ($i = 0; $i < count($images); $i++) {
                    if ($images[$i] === "") continue;

                    if ($request['foto-' . $i])
                        $images_names[] = $this->uploadFile($request['foto-' . $i], $this->path, null);
                }
            }

            $progres = $request['progress'];
            if ($progres <= 0) $request['p'] = 'planned';
            else if ($progres < 100)  $request['p'] = 'on_going';
            else $request['p'] = 'done';

            $dataNew['date'] = $request['date'];
            $dataNew['progress'] = $request['progress'];
            $dataNew['noted'] = $request['noted'] ?? '';
            $dataNew['images'] = count($images_names) > 0 ?? implode(',', $images_names);
            $dataNew['status'] = $request['p'];


            $update = $dataOld->update($dataNew);

            // Check if data is updated
            if (!$update) {
                return response()->json(['message' => "Progres Blok Gagal Diupdate", 'code' => 400], 400);
            }

            return response()->json(['message' => "Progres Blok Berhasil Diupdate", 'code' => 200], 200);
        } else {
            $images = explode(',', $request['images']);

            $images_names = [];
            if (count($images) > 0) {
                for ($i = 0; $i < count($images); $i++) {
                    if ($images[$i] === "") continue;

                    if ($request['foto-' . $i])
                        $images_names[] = $this->uploadFile($request['foto-' . $i], $this->path, null);
                }
            }

            $progres = $request['progress'];
            if ($progres <= 0) $request['p'] = 'planned';
            else if ($progres < 100)  $request['p'] = 'on_going';
            else $request['p'] = 'done';

            $customer =  $this->model->create([
                'perumahan_id' => $request['perumahan'],
                'blok_id' => $request['blok_id'],
                'date' => $request['date'],
                'progress' => $request['progress'],
                'noted' => $request['noted'],
                'images' => implode(',', $images_names),
                'status' => $request['p']
            ]);

            // Check if data is created
            if (!$customer) {
                return response()->json(['message' => "Progres Gagal Dibuat", 'code' => 400], 400);
            }

            // Progres created
            return response()->json(['message' => "Progres Berhasil Dibuat", 'code' => 201], 201);
        }
    }

    /**
     * Update Data By ID
     */
    public function update(array $request, $id) {}
}
