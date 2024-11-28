<?php

namespace App\Services;

use App\Models\Rab;
use App\Services\BaseRepository;
use App\Services\Contracts\RabContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RabService extends BaseRepository implements RabContract
{
    /**
     * @var
     */

    public function __construct(Rab $blok)
    {
        $this->model = $blok->whereNotNull('id');
    }

    public function paginated(Request $request)
    {
        $perumahanId = $request->input('perumahan');

        $this->model = $this->model->with('block')->where('perumahan_id', $perumahanId);

        $search = [];

        $limit = $request->input('length');

        $latestData = DB::table('rab')
            ->select(DB::raw('MAX(id) as latest_id'), 'blok_id', DB::raw('SUM(rab.total) as total_price'), DB::raw('COUNT(rab.id) as count'))
            ->where('perumahan_id', $perumahanId)
            ->groupBy('blok_id');

        if (empty($request->input('search'))) {
            $datas = DB::table('bloks')
                ->leftJoinSub($latestData, 'latest', function ($join) {
                    $join->on('bloks.id', '=', 'latest.blok_id');
                })
                ->leftJoin('rab', 'rab.id', '=', 'latest.latest_id')
                ->leftJoin('master_rab', 'master_rab.id', '=', 'rab.master_rab_id')
                ->where('bloks.perumahan_id', $perumahanId)
                ->select('bloks.kode', 'rab.*', 'master_rab.name', 'latest.count', 'latest.total_price')
                ->orderBy('bloks.kode', 'asc')->paginate($limit);
        } else {
            $search = $request->input('search');

            $datas = DB::table('bloks')
                ->leftJoinSub($latestData, 'latest', function ($join) {
                    $join->on('bloks.id', '=', 'latest.blok_id');
                })
                ->leftJoin('rab', 'rab.id', '=', 'latest.latest_id')
                ->leftJoin('master_rab', 'master_rab.id', '=', 'rab.master_rab_id')
                ->where('bloks.perumahan_id', $perumahanId)
                ->when($search, function ($query) use ($search) {
                    $query->where('bloks.kode', 'LIKE', "%{$search}%");
                })
                ->select('bloks.kode', 'rab.*', 'master_rab.name', 'latest.total_price', 'latest.count')
                ->orderBy('bloks.kode', 'asc')->paginate($limit);
        }

        return [
            'total_page' => $datas->lastPage(),
            'total_data' => $datas->total() ?? 0,
            'code' => 200,
            'data' => $datas,
        ];
    }
}
