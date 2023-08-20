<?php

namespace App\Services;

use App\Models\User;
use App\Services\BaseRepository;
use App\Services\Contracts\UserContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserService extends BaseRepository implements UserContract
{
    /**
     * @var
     */
    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user->whereNotNull('id');
    }

    public function paginated(Request $request)
    {
        $search = [];

        $totalData = User::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');

        if (empty($request->input('search'))) {
            $users = $this->model->paginate($limit);
        } else {
            $search = $request->input('search');

            $users = $this->model->where('name', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->paginate($limit);

            $totalFiltered = $this->model->where('name', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = [];

        if (!empty($users)) {
            // providing a dummy id instead of database ids
            foreach ($users as $user) {
                $nestedData['id'] = $user->id;
                $nestedData['name'] = $user->name;
                $nestedData['email'] = $user->email;
                $nestedData['role'] = $user->role;

                $data[] = $nestedData;
            }
        }

        return [
            'total_page' => $users->lastPage(),
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
        // create new one if email is unique
        $userEmail =  $this->model->where('email', $request['email'])->first();

        if (empty($userEmail)) {
            $users =  $this->model->create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'role' => $request['role'],
            ]);

            // Check if data is created
            if (!$users) {
                return response()->json(['message' => "User Gagal Dibuat", 'code' => 400], 400);
            }

            // user created
            return response()->json(['message' => "User Berhasil Dibuat", 'code' => 201], 201);
        } else {
            // user already exist
            return response()->json(['message' => "User Sudah Ada"], 409);
        }
    }

    /**
     * Update Data By ID
     */
    public function update(array $request, $id)
    {
        $dataOld = $this->model->find($id);

        $dataNew = [];

        if ($request['password'] == '') {
            $dataNew['password'] = $dataOld->password;
        } else {
            $dataNew['password'] = Hash::make($request['password']);
        }
        $dataNew['name'] = $request['name'];
        $dataNew['email'] = $request['email'];
        $dataNew['role'] = $request['role'];

        $update = $dataOld->update($dataNew);
        // Check if data is updated
        if (!$update) {
            return response()->json(['message' => "User Gagal Diupdate", 'code' => 400], 400);
        }

        return response()->json(['message' => "User Berhasil Diupdate", 'code' => 200], 200);
    }
}
