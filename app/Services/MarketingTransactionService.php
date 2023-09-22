<?php

namespace App\Services;

use App\Models\Blok;
use App\Models\MarketingTransaction;
use App\Services\BaseRepository;
use App\Services\Contracts\MarketingTransactionContract;
use App\Traits\Uploadable;


class MarketingTransactionService extends BaseRepository implements MarketingTransactionContract
{
    use Uploadable;
    /**
     * @var
     */
    protected $model, $path = 'uploads/transaksi/';

    public function __construct(MarketingTransaction $transaction)
    {
        $this->model = $transaction->whereNotNull('id');
    }

    public function store(array $request)
    {
        if ($request['id'] === null || empty($request['id'])) {
            // create new one if kode and perumahan is unique
            $no =  $this->model->where('marketing_id', $request['marketing'])
                ->where('perumahan_id', $request['perumahan'])
                ->where('blok_id', $request['blok'])
                ->where('count', $request['count'])
                ->first();

            if (empty($no)) {
                $blok = Blok::where('kode', $request['blok'])->first();

                if (empty($blok))
                    return response()->json(['message' => "Blok Tidak Ditemukan", 'code' => 404], 404);

                if ($request['bukti_transfer'])
                    $request['bukti_transfer'] = $this->uploadFile($request['bukti_transfer'], $this->path . 'marketing/', null);

                $transaction =  $this->model->create([
                    'perumahan_id' => $request['perumahan'],
                    'marketing_id' => $request['marketing'],
                    'blok_id' => $blok->id,
                    'count' => $request['count'],
                    'transaction_date' => $request['transaction_date'],
                    'transaction' => $request['transaction'],
                    'bukti_transfer' => $request['bukti_transfer']
                ]);

                // Check if data is created
                if (!$transaction) {
                    return response()->json(['message' => "Transaksi Gagal Dibuat", 'code' => 400], 400);
                }

                // Transaksi created
                return response()->json(['message' => "Transaksi Berhasil Dibuat", 'code' => 201], 201);
            } else {
                // Transaksi already exist
                return response()->json(['message' => "Transaksi Sudah Ada"], 409);
            }
        }

        $transaction = MarketingTransaction::find($request['id']);
        $blok = Blok::where('kode', $request['blok'])->first();

        if (empty($blok))
            return response()->json(['message' => "Blok Tidak Ditemukan", 'code' => 404], 404);

        $update = $transaction->update([
            'transaction_date' => $request['transaction_date'],
            'transaction' => $request['transaction'],
        ]);

        if (!$update)
            return response()->json(['message' => "Transaksi Gagal Diperbaharui", 'code' => 400], 400);

        return response()->json(['message' => "Transaksi Berhasil Diperbaharui", 'code' => 200], 200);
    }

    public function marketing(array $request)
    {
        return $this->model->where('marketing_id', $request['marketing'])->whereHas('blok', function ($query) use ($request) {
            $query->where('kode', $request['blok']);
        })->orderBy('count', 'desc')->get();
    }
}
