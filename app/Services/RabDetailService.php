<?php

namespace App\Services;

use App\Models\Blok;
use App\Models\Rab;
use App\Services\BaseRepository;
use App\Services\Contracts\RabDetailContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RabDetailService extends BaseRepository implements RabDetailContract
{
    /**
     * @var
     */

    public function __construct(Rab $blok)
    {
        $this->model = $blok->whereNotNull('id');
    }

    public function paginated(Request $request)
    {
        $perumahanId = $request->input('perumahan');
        $blokId = $request->input('blok');

        $blok = Blok::where('kode', $blokId)->first();

        if (!$blok) {
            return [
                'total_page' => 0,
                'total_data' => 0,
                'code' => 200,
                'data' => [],
            ];
        }

        $this->model = $this->model->with('masterRab')->where('perumahan_id', $perumahanId)->where('blok_id', $blok->id);

        $search = [];

        $limit = $request->input('length');


        if (empty($request->input('search'))) {
            $datas = $this->model->paginate($limit);
        } else {
            $search = $request->input('search');

            $datas =  $this->model->whereHas('masterRab', function ($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%");
            })
                ->orWhere('amount', 'LIKE', "%{$search}%")
                ->orWhere('total', 'LIKE', "%{$search}%")
                ->orWhere('price', 'LIKE', "%{$search}%")
                ->orWhere('noted', 'LIKE', "%{$search}%")
                ->paginate($limit);
        }

        return [
            'total_page' => $datas->lastPage(),
            'total_data' => $datas->total() ?? 0,
            'code' => 200,
            'data' => $datas,
        ];
    }

    public function paginatedLaporan(Request $request) {}

    /**
     * Store Data
     */
    public function store(array $request)
    {

        $blok = Blok::where('kode', $request['blok_id'])->first();

        if (!$blok) {
            return response()->json(['message' => "Blok Tidak Ditemukan", 'code' => 404], 404);
        }

        $data =  $this->model->create([
            'perumahan_id' => $request['perumahan'],
            'blok_id' => $blok->id,
            'master_rab_id' => $request['master_rab_id'],
            'amount' => $request['amount'],
            'unit' => $request['unit'],
            'price' => $request['price'],
            'total' => $request['total'],
            'noted' => $request['noted'],
        ]);

        // Check if data is created
        if (!$data) {
            return response()->json(['message' => "RAB Gagal Dibuat", 'code' => 400], 400);
        }

        // RAB created
        return response()->json(['message' => "RAB Berhasil Dibuat", 'code' => 201], 201);
    }

    /**
     * Update Data By ID
     */
    public function update(array $request, $id)
    {
        $dataNew = [];
        $dataOld = $this->model->find($id);

        if (!$dataOld) {
            return response()->json(['message' => "Data Tidak Ditemukan", 'code' => 404], 404);
        }

        $dataNew = [
            'perumahan_id' => $request['perumahan'],
            'master_rab_id' => $request['master_rab_id'],
            'amount' => $request['amount'],
            'unit' => $request['unit'],
            'price' => $request['price'],
            'total' => $request['total'],
            'noted' => $request['noted'],
        ];

        $update = $dataOld->update($dataNew);

        // Check if data is updated
        if (!$update) {
            return response()->json(['message' => "RAB Gagal Diupdate", 'code' => 400], 400);
        }

        return response()->json(['message' => "RAB Berhasil Diupdate", 'code' => 200], 200);
    }
}
