<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::all();
        return view('country.index',compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('country.create');
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
            'country_code' => 'required|max:3',
            'name' => 'required|max:60',
        ]);

        $item = new Country();
        $item->country_code = $request->country_code;
        $item->name = $request->name;
        $item->save();

        return redirect("/country");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        return view('country.edit',['item'=>$country]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        $this->validate($request, [
            'country_code' => 'required|max:3',
            'name' => 'required|max:60',
        ]);

        $item = $country;
        $item->country_code = $request->country_code;
        $item->name = $request->name;
        $item->save();

        return redirect("/country/{$item->id}/edit");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $country->delete();
        return back();
    }

    public function search(Request $request)
    {
        $countries = DB::table('countries')
            ->select(['id', 'country_code', 'name'])
            ->whereNull('deleted_at');
        return Datatables::of($countries)
            ->addColumn('action', function ($row) {

                $btn = '<span class="px-2 d-inline-flex"><form method="get" action="' . url('/country/' . $row->id . '/edit') . '" ><input type="submit" class="edit btn btn-primary btn-sm" value="Edit"></form></span>';
                $btn .= '<a data-toggle="modal" data-target="#deleteModel" onclick="$(\'#delete-form\').attr(\'action\',\'' . url('country/' . $row->id) . '\'); $(\'#delete\').modal().show();" class="edit btn btn-danger btn-sm">Delete</a>';

                return $btn;
            })
            ->make(true);
    }

}
