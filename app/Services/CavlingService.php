<?php

namespace App\Services;

use App\Models\Blok;
use App\Models\Customer;
use App\Services\BaseRepository;
use App\Services\Contracts\CavlingContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;


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

    public function findByCriteria(array $criteria): ?Model
    {
        return $this->model->where($criteria)->with('customer')->first();
    }

    public function data(Request $request)
    {
        return $this->model->where('perumahan_id', $request->perumahan)->with(['status_blok'])->get();
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
            DB::beginTransaction();
            try {
                $perumahan->update([
                    'status_blok_id' => $request['status'],
                    'customer_id' => $request['customer'],
                ]);

                Customer::where('id', $request['customer'])->update([
                    'marketing_id' => $request['marketing'],
                ]);

                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(['message' => "Terjadi Kesalahan"], 409);
            }

            return response()->json(['message' => "Perumahan Berhasil Diupdate", 'code' => 200], 200);
        } else {
            // user already exist
            return response()->json(['message' => "Terjadi Kesalahan"], 409);
        }
    }
}
