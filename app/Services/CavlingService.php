<?php

namespace App\Services;

use App\Models\Blok;
use App\Services\BaseRepository;
use App\Services\Contracts\CavlingContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class CavlingService extends BaseRepository implements CavlingContract
{
    /**
     * @var
     */
    protected $model;

    public function __construct(Blok $blok)
    {
        $this->model = $blok->whereNotNull('id');
    }

    public function data(Request $request)
    {
        $data = $this->model->where('perumahan_id', $request->perumahan)->with(['status_blok'])->get();

        if (empty($data)) {
            return response()->json(['message' => "Data Tidak Ditemukan"], 404);
        }

        return response()->json(['message' => "Data Ditemukan", 'data' => $data], 200);
    }

    public function getKode(Request $request)
    {
        $data = $this->model->where('perumahan_id', $request->perumahan)->select('kode')->get();

        if (empty($data)) {
            return response()->json(['message' => "Data Tidak Ditemukan"], 404);
        }

        return response()->json(['message' => "Data Ditemukan", 'data' => $data], 200);
    }

    /**
     * Update Data By ID
     */
    public function update(array $request, $id)
    {
        // create new one if kode and perumahan_id is unique
        $perumahan =  $this->model->where(['kode' => $request['id'], 'perumahan_id' => $request['perumahan']])->first();

        if (!empty($perumahan)) {
            $updatePerumahan =  $perumahan->update([
                'status_blok_id' => $request['status'],
                'customer_id' => $request['customer'],
            ]);

            // Check if data is created
            if (!$updatePerumahan) {
                return response()->json(['message' => "Perumahan Gagal Diupdate", 'code' => 400], 400);
            }

            return response()->json(['message' => "Perumahan Berhasil Diupdate", 'code' => 200], 200);
        } else {
            // user already exist
            return response()->json(['message' => "Terjadi Kesalahan"], 409);
        }
    }
}
