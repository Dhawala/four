<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('department.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('department.create');
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
        ]);

        $item = new Department();
        $item->name = $request->name;
        $item->save();

        return redirect("/department");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        return view('department.edit',['item'=>$department]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        $this->validate($request, [
            'name' => 'required|max:60',
        ]);

        $item = $department;
        $item->name = $request->name;
        $item->save();

        return redirect("/department/{$item->id}/edit");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $department->delete();
        return back();
    }

    public function search(Request $request)
    {
        $departments = \DB::table('departments')
            ->select(['id', 'name'])
            ->whereNull('deleted_at');
        return Datatables::of($departments)
            ->addColumn('action', function ($row) {

                $btn = '<span class="px-2 d-inline-flex"><form method="get" action="' . url('/department/' . $row->id . '/edit') . '" ><input type="submit" class="edit btn btn-primary btn-sm" value="Edit"></form></span>';
                $btn .= '<a data-toggle="modal" data-target="#deleteModel" onclick="$(\'#delete-form\').attr(\'action\',\'' . url('department/' . $row->id) . '\'); $(\'#delete\').modal().show();" class="edit btn btn-danger btn-sm">Delete</a>';

                return $btn;
            })
            ->make(true);
    }

}
