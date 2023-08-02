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
        $columns = [
            1 => 'id',
            2 => 'name',
            3 => 'email',
            4 => 'email_verified_at',
        ];

        $search = [];

        $totalData = User::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $withRole = $request->input('withRole');

        if ($withRole) {
            $selectedRole = $request->input('role');
            $this->model->whereHas('role', function ($query) use ($selectedRole) {
                $query->where('name', 'LIKE', "%$selectedRole%");
            });
        }

        if (empty($request->input('search.value'))) {
            $users = $this->model->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');

            $users = $this->model->where('id', 'LIKE', "%{$search}%")
                ->orWhere('name', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = $this->model->where('id', 'LIKE', "%{$search}%")
                ->orWhere('name', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = [];

        if (!empty($users)) {
            // providing a dummy id instead of database ids
            $ids = $start;

            foreach ($users as $user) {
                $nestedData['id'] = $user->id;
                $nestedData['fake_id'] = ++$ids;
                $nestedData['name'] = $user->name;
                $nestedData['email'] = $user->email;
                $nestedData['email_verified_at'] = $user->email_verified_at;
                if ($user->role)
                    $nestedData['role'] = $user->role->name;

                $data[] = $nestedData;
            }
        }

        if ($data) {
            return response()->json([
                'draw' => intval($request->input('draw')),
                'recordsTotal' => intval($totalData),
                'recordsFiltered' => intval($totalFiltered),
                'code' => 200,
                'data' => $data,
            ]);
        } else {
            return response()->json([
                'message' => 'Internal Server Error',
                'code' => 500,
                'data' => [],
            ]);
        }
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
                'password' => Hash::make($request['password'])
            ]);

            // Check if data is created
            if (!$users) {
                return response()->json(['message' => "User Gagal Dibuat"], 400);
            }

            // user created
            return response()->json(['message' => "User Berhasil Dibuat"], 201);
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

        $update = $this->model->find($id)->update($dataNew);

        // Check if data is updated
        if (!$update) {
            return response()->json(['message' => "User Gagal Diupdate"], 400);
        }

        return response()->json(['message' => "User Berhasil Diupdate"], 200);
    }
}
