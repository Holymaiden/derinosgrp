<?php

namespace App\Services;

use App\Models\MasterRab;
use App\Services\BaseRepository;
use App\Services\Contracts\MasterRabContract;
use Illuminate\Http\Request;


class MasterRabService extends BaseRepository implements MasterRabContract
{
    /**
     * @var
     */
    protected $model;

    public function __construct(MasterRab $model)
    {
        $this->model = $model->whereNotNull('id');
    }

    public function paginated(Request $request)
    {
        $search = [];
        $totalData = MasterRab::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');

        if (empty($request->input('search'))) {
            $datas = $this->model->paginate($limit);
        } else {
            $search = $request->input('search');

            $datas = $this->model->where('name', 'LIKE', "%{$search}%")
                ->paginate($limit);

            $totalFiltered = $this->model->where('name', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = [];

        if (!empty($datas)) {
            // providing a dummy id instead of database ids
            foreach ($datas as $v) {
                $nestedData['id'] = $v->id;
                $nestedData['name'] = $v->name;

                $data[] = $nestedData;
            }
        }

        return [
            'total_page' => $datas->lastPage(),
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
        $data =  $this->model->where('name', $request['name'])->first();

        if (empty($data)) {
            $data =  $this->model->create([
                'name' => $request['name'],
            ]);

            // Check if data is created
            if (!$data) {
                return response()->json(['message' => "Master RAB Gagal Dibuat", 'code' => 400], 400);
            }

            // Master RAB created
            return response()->json(['message' => "Master RAB Berhasil Dibuat", 'code' => 201], 201);
        } else {
            // Master RAB already exist
            return response()->json(['message' => "Master RAB Sudah Ada"], 409);
        }
    }

    /**
     * Update Data By ID
     */
    public function update(array $request, $id)
    {
        $dataNew = [];
        $dataOld = $this->model->find($id);

        if ($dataOld->name != $request['name']) {
            $dataSama = $this->model->where('name', $request['name'])->first();

            if (!empty($dataSama))
                return response()->json(['message' => "Master RAB Sudah Ada", 'code' => 409], 409);
        }

        $dataNew['name'] = $request['name'];

        $update = $dataOld->update($dataNew);

        // Check if data is updated
        if (!$update) {
            return response()->json(['message' => "Master RAB Gagal Diupdate", 'code' => 400], 400);
        }

        return response()->json(['message' => "Master RAB Berhasil Diupdate", 'code' => 200], 200);
    }
}
