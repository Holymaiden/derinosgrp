<?php

namespace App\Services;

use App\Models\Customer;
use App\Services\BaseRepository;
use App\Services\Contracts\CustomerContract;
use App\Traits\Uploadable;
use Illuminate\Http\Request;


class CustomerService extends BaseRepository implements CustomerContract
{
    use Uploadable;
    /**
     * @var
     */
    protected $model, $path = 'uploads/customer/';

    public function __construct(Customer $customer)
    {
        $this->model = $customer->whereNotNull('id');
    }

    public function paginated(Request $request)
    {
        $this->model = $this->model->where('perumahan_id', $request->input('perumahan'));

        $search = [];
        $totalData = Customer::where('perumahan_id', $request->input('perumahan'))->count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');

        if (empty($request->input('search'))) {
            $customers = $this->model->paginate($limit);
        } else {
            $search = $request->input('search');

            $customers = $this->model->where('nik', 'LIKE', "%{$search}%")
                ->orWhere('nama', 'LIKE', "%{$search}%")
                ->orWhere('alamat', 'LIKE', "%{$search}%")
                ->orWhere('telepon', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->paginate($limit);

            $totalFiltered = $this->model->where('nik', 'LIKE', "%{$search}%")
                ->orWhere('nama', 'LIKE', "%{$search}%")
                ->orWhere('alamat', 'LIKE', "%{$search}%")
                ->orWhere('telepon', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = [];

        if (!empty($customers)) {
            // providing a dummy id instead of database ids
            foreach ($customers as $customer) {
                $nestedData['id'] = $customer->id;
                $nestedData['nama'] = $customer->nama;
                $nestedData['nik'] = $customer->nik;
                $nestedData['alamat'] = $customer->alamat;
                $nestedData['tempat_lahir'] = $customer->tempat_lahir;
                $nestedData['tanggal_lahir'] = $customer->tanggal_lahir;
                $nestedData['jenis_kelamin'] = $customer->jenis_kelamin;
                $nestedData['telepon'] = $customer->telepon;
                $nestedData['email'] = $customer->email;
                $nestedData['pekerjaan'] = $customer->pekerjaan;
                $nestedData['ktp'] = $customer->ktp;

                $data[] = $nestedData;
            }
        }

        return [
            'total_page' => $customers->lastPage(),
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
        // create new one if nik is unique
        $nik =  $this->model->where('nik', $request['nik'])->first();

        if (empty($nik)) {
            // Upload Bukti Transfer
            if ($request['bukti_transfer'])
                $request['bukti_transfer'] = $this->uploadFile($request['bukti_transfer'], $this->path . 'perumahan/', null);

            $customer =  $this->model->create([
                'perumahan_id' => $request['perumahan'],
                'nama' => $request['name'],
                'nik' => $request['nik'],
                'alamat' => $request['alamat'],
                'tempat_lahir' => $request['tempat_lahir'],
                'tanggal_lahir' => $request['tanggal_lahir'],
                'jenis_kelamin' => $request['jenis_kelamin'],
                'telepon' => $request['telepon'],
                'email' => $request['email'],
                'pekerjaan' => $request['pekerjaan'],
                'ktp' => $request['ktp'],
            ]);

            // Check if data is created
            if (!$customer) {
                return response()->json(['message' => "Customer Gagal Dibuat", 'code' => 400], 400);
            }

            // Customer created
            return response()->json(['message' => "Customer Berhasil Dibuat", 'code' => 201], 201);
        } else {
            // Customer already exist
            return response()->json(['message' => "Customer Sudah Ada"], 409);
        }
    }

    /**
     * Update Data By ID
     */
    public function update(array $request, $id)
    {
        $dataNew = [];
        $dataOld = $this->model->find($id);

        if ($dataOld->nik != $request['nik']) {
            $dataSameNik = $this->model->where('nik', $request['nik'])->first();

            if (!empty($dataSameNik))
                return response()->json(['message' => "NIK Sudah Ada", 'code' => 409], 409);
        }

        if ($request['ktp'])
            $request['ktp'] = $this->uploadFile($request['ktp'], $this->path . 'ktp/', null);

        $dataNew['nik'] = $request['nik'];
        $dataNew['nama'] = $request['name'];
        $dataNew['alamat'] = $request['alamat'];
        $dataNew['tempat_lahir'] = $request['tempat_lahir'];
        $dataNew['tanggal_lahir'] = $request['tanggal_lahir'];
        $dataNew['jenis_kelamin'] = $request['jenis_kelamin'];
        $dataNew['telepon'] = $request['telepon'];
        $dataNew['email'] = $request['email'];
        $dataNew['pekerjaan'] = $request['pekerjaan'];
        $dataNew['ktp'] = $request['ktp'] ?? $dataOld->ktp;

        $update = $dataOld->update($dataNew);

        // Check if data is updated
        if (!$update) {
            return response()->json(['message' => "Customer Gagal Diupdate", 'code' => 400], 400);
        }

        return response()->json(['message' => "Customer Berhasil Diupdate", 'code' => 200], 200);
    }
}
