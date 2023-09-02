<?php

namespace App\Services;

use App\Models\MasterPerumahan;
use App\Services\BaseRepository;
use App\Services\Contracts\PropertiContract;
use Illuminate\Http\Request;


class PropertiService extends BaseRepository implements PropertiContract
{
    /**
     * @var
     */
    protected $model;

    public function __construct(MasterPerumahan $properti)
    {
        $this->model = $properti->whereNotNull('id');
    }

    public function paginated(Request $request)
    {
        $search = [];
        $totalData = MasterPerumahan::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');

        if (empty($request->input('search'))) {
            $propertis = $this->model->paginate($limit);
        } else {
            $search = $request->input('search');

            $propertis = $this->model->where('nik', 'LIKE', "%{$search}%")
                ->orWhere('nama_perumahan', 'LIKE', "%{$search}%")
                ->orWhere('alamat', 'LIKE', "%{$search}%")
                ->paginate($limit);

            $totalFiltered = $this->model->where('nik', 'LIKE', "%{$search}%")
                ->orWhere('nama_perumahan', 'LIKE', "%{$search}%")
                ->orWhere('alamat', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = [];

        if (!empty($propertis)) {
            // providing a dummy id instead of database ids
            foreach ($propertis as $properti) {
                $nestedData['id'] = $properti->id;
                $nestedData['nama_perumahan'] = $properti->nama_perumahan;
                $nestedData['alamat'] = $properti->alamat;

                $data[] = $nestedData;
            }
        }

        return [
            'total_page' => $propertis->lastPage(),
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
        // create new one if nama perumahan is unique
        $perumahan =  $this->model->where('nama_perumahan', $request['nama_perumahan'])->first();

        if (empty($perumahan)) {

            $properti =  $this->model->create([
                'nama_perumahan' => $request['nama_perumahan'],
                'alamat' => $request['alamat'],
                'url_maps' => 'Belum Ada'
            ]);

            // Check if data is created
            if (!$properti) {
                return response()->json(['message' => "Properti Gagal Dibuat", 'code' => 400], 400);
            }

            // Properti created
            return response()->json(['message' => "Properti Berhasil Dibuat", 'code' => 201], 201);
        } else {
            // Properti already exist
            return response()->json(['message' => "Properti Sudah Ada"], 409);
        }
    }

    /**
     * Update Data By ID
     */
    public function update(array $request, $id)
    {
        $dataNew = [];
        $dataOld = $this->model->find($id);

        if ($dataOld->nama_perumahan != $request['nama_perumahan']) {
            $dataSama = $this->model->where('nama_perumahan', $request['nama_perumahan'])->first();

            if (!empty($dataSama))
                return response()->json(['message' => "Perumahan Sudah Ada", 'code' => 409], 409);
        }

        $dataNew['nama_perumahan'] = $request['nama_perumahan'];
        $dataNew['alamat'] = $request['alamat'];
        $dataNew['url_maps'] = 'Belum Ada';

        $update = $dataOld->update($dataNew);

        // Check if data is updated
        if (!$update) {
            return response()->json(['message' => "Properti Gagal Diupdate", 'code' => 400], 400);
        }

        return response()->json(['message' => "Properti Berhasil Diupdate", 'code' => 200], 200);
    }
}
