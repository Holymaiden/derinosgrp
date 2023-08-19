<?php

namespace App\Services;

use App\Models\Customer;
use App\Services\BaseRepository;
use App\Services\Contracts\CustomerContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class CustomerService extends BaseRepository implements CustomerContract
{
    /**
     * @var
     */
    protected $model;

    public function __construct(Customer $customer)
    {
        $this->model = $customer->whereNotNull('id');
    }

    public function paginated(Request $request)
    {
        $search = [];

        $totalData = Customer::count();

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
                $nestedData['kk'] = $customer->kk;

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
            $customer =  $this->model->create([
                'nama' => $request['nama'],
                'nik' => $request['nik'],
                'alamat' => $request['alamat'],
                'tempat_lahir' => $request['tempat_lahir'],
                'tanggal_lahir' => $request['tanggal_lahir'],
                'jenis_kelamin' => $request['jenis_kelamin'],
                'telepon' => $request['telepon'],
                'email' => $request['email'],
                'pekerjaan' => $request['pekerjaan'],
                'ktp' => $request['ktp'],
                'kk' => $request['kk'],
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

        $dataSameNik = $this->model->where('nik', $request['nik'])->first();

        if (empty($dataSameNik)) {
            $dataNew['nik'] = $request['nik'];
        } else {
            return response()->json(['message' => "NIK Sudah Ada", 'code' => 409], 409);
        }

        $dataNew['nama'] = $request['nama'];
        $dataNew['alamat'] = $request['alamat'];
        $dataNew['tempat_lahir'] = $request['tempat_lahir'];
        $dataNew['tanggal_lahir'] = $request['tanggal_lahir'];
        $dataNew['jenis_kelamin'] = $request['jenis_kelamin'];
        $dataNew['telepon'] = $request['telepon'];
        $dataNew['email'] = $request['email'];
        $dataNew['pekerjaan'] = $request['pekerjaan'];
        $dataNew['ktp'] = $request['ktp'];
        $dataNew['kk'] = $request['kk'];

        $update = $this->model->find($id)->update($dataNew);
        // Check if data is updated
        if (!$update) {
            return response()->json(['message' => "Customer Gagal Diupdate", 'code' => 400], 400);
        }

        return response()->json(['message' => "Customer Berhasil Diupdate", 'code' => 200], 200);
    }
}
