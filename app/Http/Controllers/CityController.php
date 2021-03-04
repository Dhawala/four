<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;
use DB;
use Yajra\DataTables\DataTables;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('city.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::all();
        return view('city.create',compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:60',
            'state_id' => 'required|numeric',
        ]);

        $item = new City();
        $item->name = $request->name;
        $item->state_id = $request->state_id;
        $item->save();

        return redirect("/city");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        $states = State::all();
        return view('city.edit',['item'=>$city,'states'=>$states]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $this->validate($request, [
            'name' => 'required|max:60',
        ]);

        $item = $city;
        $item->state_id = $request->state_id;
        $item->name = $request->name;
        $item->save();

        return redirect("/city/{$item->id}/edit");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city->delete();
        return back();
    }

    public function search(Request $request)
    {
        $citys = DB::table('cities')->select([DB::raw('cities.id as id'),DB::raw('cities.name as name'),DB::raw('states.name as state')])
            ->leftJoin('states','cities.state_id','=','states.id')
//            City::select(['id', 'name','state_id'])
//            ->with(['state'=>function($query){
//                $query->select(['id','name']);
//            }])
            ->whereNull('cities.deleted_at')
            ->whereNull('states.deleted_at')->toSql();
        $c = DB::table(DB::raw('('.$citys.') as city_data'));
        return Datatables::of($c)
            ->addColumn('action', function ($row) {

                $btn = '<span class="px-2 d-inline-flex"><form method="get" action="' . url('/city/' . $row->id . '/edit') . '" ><input type="submit" class="edit btn btn-primary btn-sm" value="Edit"></form></span>';
                $btn .= '<a data-toggle="modal" data-target="#deleteModel" onclick="$(\'#delete-form\').attr(\'action\',\'' . url('city/' . $row->id) . '\'); $(\'#delete\').modal().show();" class="edit btn btn-danger btn-sm">Delete</a>';

                return $btn;
            })
            ->make(true);
    }

    public function all_cities(Request $request){
        $cities = City::query()->select(['id','name']);
        if($request->state){
            $cities->where('state_id',$request->state);
        }
        return response()->json($cities->get());
    }

}
