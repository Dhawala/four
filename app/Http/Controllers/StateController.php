<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;
use DB;
use Yajra\DataTables\DataTables;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('state.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = State::all();
        return view('state.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:60',
            'country_id' => 'required|numeric',
        ]);

        $item = new State();
        $item->name = $request->name;
        $item->country_id = $request->country_id;
        $item->save();

        return redirect("/country");

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Country $country
     * @return \Illuminate\Http\Response
     */
    public function show(State $state)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Country $country
     * @return \Illuminate\Http\Response
     */
    public function edit(State $state)
    {
        $countries = Country::all();

        return view('state.edit', ['item' => $state, 'countries' => $countries]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Country $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, State $state)
    {
        $this->validate($request, [
            'name' => 'required|max:60',
            'country_id' => 'required|numeric'
        ]);

        $item = $state;
        $item->country_id = $request->country_id;
        $item->name = $request->name;
        $item->save();

        return redirect("/state/{$item->id}/edit");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Country $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {
        $state->delete();
        return back();
    }

    public function search(Request $request)
    {
        $states = DB::table('states')->select([DB::raw('states.id as id'),
            DB::raw('states.name as name'),
            DB::raw('countries.name as country')])
            ->leftJoin('countries', 'states.country_id', '=', 'countries.id')
            ->whereNull('states.deleted_at')
            ->whereNull('countries.deleted_at')->toSql();
        $c = DB::table(DB::raw('(' . $states . ') as state_data'));
        return Datatables::of($c)
            ->addColumn('action', function ($row) {

                $btn = '<span class="px-2 d-inline-flex"><form method="get" action="' . url('/state/' . $row->id . '/edit') . '" ><input type="submit" class="edit btn btn-primary btn-sm" value="Edit"></form></span>';
                $btn .= '<a data-toggle="modal" data-target="#deleteModel" onclick="$(\'#delete-form\').attr(\'action\',\'' . url('state/' . $row->id) . '\'); $(\'#delete\').modal().show();" class="edit btn btn-danger btn-sm">Delete</a>';

                return $btn;
            })
            ->make(true);
    }

    public function all_states(Request $request)
    {
        $states = State::query()->select(['id','name','country_id',]);
        if(isset($request->country)){
            $states->where('country_id',$request->country);
        }
        return response()->json($states->get());
    }
}
