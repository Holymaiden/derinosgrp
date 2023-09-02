<?php

namespace App\Services;

use App\Models\Blok;
use App\Services\BaseRepository;
use App\Services\Contracts\PerumahanContract;
use Illuminate\Http\Request;


class PerumahanService extends BaseRepository implements PerumahanContract
{
    /**
     * @var
     */

    public function __construct(Blok $blok)
    {
        $this->model = $blok->whereNotNull('id');
    }

    public function paginated(Request $request)
    {
        $this->model = $this->model->where('perumahan_id', $request->input('perumahan'))->with(['customer', 'status_blok']);

        $search = [];
        $filter_status = $request->input('status') ?? '';
        $filter_bayar = $request->input('bayar') ?? '';

        $totalData = Blok::where('perumahan_id', $request->input('perumahan'))->when($filter_status, function ($query) use ($filter_status) {
            return $query->where('status_blok_id', $filter_status);
        })->when($filter_bayar, function ($query) use ($filter_bayar) {
            return $query->where('status_bayar', $filter_bayar);
        })->count();

        $this->model = $this->model->when($filter_status, function ($query) use ($filter_status) {
            return $query->where('status_blok_id', $filter_status);
        })->when($filter_bayar, function ($query) use ($filter_bayar) {
            return $query->where('status_bayar', $filter_bayar);
        });

        $totalFiltered = $totalData;

        $limit = $request->input('length');

        if (empty($request->input('search'))) {
            $bloks = $this->model->paginate($limit);
        } else {
            $search = $request->input('search');

            $bloks = $this->model->where('kode', 'LIKE', "%{$search}%")
                ->orWhere('panjang', 'LIKE', "%{$search}%")
                ->orWhere('harga_jual', 'LIKE', "%{$search}%")
                ->orWhere('lebar', 'LIKE', "%{$search}%")
                ->orWhere('luas', 'LIKE', "%{$search}%")
                ->paginate($limit);

            $totalFiltered = $this->model->where('kode', 'LIKE', "%{$search}%")
                ->orWhere('panjang', 'LIKE', "%{$search}%")
                ->orWhere('harga_jual', 'LIKE', "%{$search}%")
                ->orWhere('lebar', 'LIKE', "%{$search}%")
                ->orWhere('luas', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = [];

        if (!empty($bloks)) {
            // providing a dummy id instead of database ids
            foreach ($bloks as $blok) {
                $nestedData['id'] = $blok->id;
                $nestedData['kode'] = $blok->kode;
                $nestedData['panjang'] = $blok->panjang;
                $nestedData['lebar'] = $blok->lebar;
                $nestedData['luas'] = $blok->luas;
                $nestedData['harga_permeter'] = $blok->harga_permeter;
                $nestedData['harga_jual'] = $blok->harga_jual;
                $nestedData['status_blok'] = $blok->status_blok->status;
                $nestedData['status_blok_warna'] = $blok->status_blok->warna;
                $nestedData['status_blok_icon'] = $blok->status_blok->icon;
                $nestedData['status_bayar'] = $blok->status_bayar;
                $nestedData['keterangan'] = $blok->keterangan;
                $nestedData['marketing'] = $blok->customer?->marketing?->nama;

                $data[] = $nestedData;
            }
        }

        return [
            'total_page' => $bloks->lastPage(),
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
        // create new one if kode and perumahan is unique
        $nik =  $this->model->where('kode', $request['kode'])
            ->where('perumahan_id', $request['perumahan'])
            ->first();

        if (empty($nik)) {
            $blok =  $this->model->create([
                'perumahan_id' => $request['perumahan'],
                'kode' => strtolower($request['kode']),
                'panjang' => $request['panjang'],
                'lebar' => $request['lebar'],
                'luas' => $request['luas'],
                'harga_permeter' => $request['harga_permeter'],
                'harga_jual' => $request['harga_jual'],
                'status_blok_id' => $request['status_blok_id'],
                'status_bayar' => $request['status_bayar'],
                'keterangan' => $request['keterangan'],
            ]);

            // Check if data is created
            if (!$blok) {
                return response()->json(['message' => "Blok Gagal Dibuat", 'code' => 400], 400);
            }

            // Blok created
            return response()->json(['message' => "Blok Berhasil Dibuat", 'code' => 201], 201);
        } else {
            // Blok already exist
            return response()->json(['message' => "Blok Sudah Ada"], 409);
        }
    }

    /**
     * Update Data By ID
     */
    public function update(array $request, $id)
    {
        $dataNew = [];
        $dataOld = $this->model->find($id);

        if ($dataOld->kode != $request['kode']) {
            $dataSameNik = $this->model->where('kode', $request['kode'])
                ->where('perumahan_id', $request['perumahan'])
                ->first();

            if (!empty($dataSameNik))
                return response()->json(['message' => "Blok Sudah Ada", 'code' => 409], 409);
        }

        $dataNew['kode'] = $request['kode'];
        $dataNew['panjang'] = $request['panjang'];
        $dataNew['lebar'] = $request['lebar'];
        $dataNew['luas'] = $request['luas'];
        $dataNew['harga_permeter'] = $request['harga_permeter'];
        $dataNew['harga_jual'] = $request['harga_jual'];
        $dataNew['status_blok_id'] = $request['status_blok_id'];
        $dataNew['status_bayar'] = $request['status_bayar'];
        $dataNew['keterangan'] = $request['keterangan'];

        $update = $dataOld->update($dataNew);

        // Check if data is updated
        if (!$update) {
            return response()->json(['message' => "Blok Gagal Diupdate", 'code' => 400], 400);
        }

        return response()->json(['message' => "Blok Berhasil Diupdate", 'code' => 200], 200);
    }
}
