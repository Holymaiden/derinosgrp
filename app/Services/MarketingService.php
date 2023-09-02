<?php

namespace App\Services;

use App\Models\Marketing;
use App\Services\BaseRepository;
use App\Services\Contracts\MarketingContract;
use Illuminate\Http\Request;


class MarketingService extends BaseRepository implements MarketingContract
{
    /**
     * @var
     */
    protected $model;

    public function __construct(Marketing $marketing)
    {
        $this->model = $marketing->whereNotNull('id');
    }

    public function paginated(Request $request)
    {
        $search = [];
        $totalData = Marketing::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');

        if (empty($request->input('search'))) {
            $marketings = $this->model->paginate($limit);
        } else {
            $search = $request->input('search');

            $marketings = $this->model->where('nama', 'LIKE', "%{$search}%")
                ->paginate($limit);

            $totalFiltered = $this->model->where('nama', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = [];

        if (!empty($marketings)) {
            // providing a dummy id instead of database ids
            foreach ($marketings as $marketing) {
                $nestedData['id'] = $marketing->id;
                $nestedData['nama'] = $marketing->nama;

                $data[] = $nestedData;
            }
        }

        return [
            'total_page' => $marketings->lastPage(),
            'total_data' => $totalFiltered ?? 0,
            'code' => 200,
            'data' => $data,
        ];
    }

    /**
     * Store Data
     */
    public function store(array $request)
    {
        // create new one if nama is unique
        $marketing =  $this->model->where('nama', $request['nama'])->first();

        if (empty($marketing)) {
            $marketing =  $this->model->create([
                'nama' => $request['nama'],
            ]);

            // Check if data is created
            if (!$marketing) {
                return response()->json(['message' => "Marketing Gagal Dibuat", 'code' => 400], 400);
            }

            // Marketing created
            return response()->json(['message' => "Marketing Berhasil Dibuat", 'code' => 201], 201);
        } else {
            // Marketing already exist
            return response()->json(['message' => "Marketing Sudah Ada"], 409);
        }
    }

    /**
     * Update Data By ID
     */
    public function update(array $request, $id)
    {
        $dataNew = [];
        $dataOld = $this->model->find($id);

        if ($dataOld->nama != $request['nama']) {
            $dataSama = $this->model->where('nama', $request['nama'])->first();

            if (!empty($dataSama))
                return response()->json(['message' => "Marketing Sudah Ada", 'code' => 409], 409);
        }

        $dataNew['nama'] = $request['nama'];

        $update = $dataOld->update($dataNew);

        // Check if data is updated
        if (!$update) {
            return response()->json(['message' => "Marketing Gagal Diupdate", 'code' => 400], 400);
        }

        return response()->json(['message' => "Marketing Berhasil Diupdate", 'code' => 200], 200);
    }
}
