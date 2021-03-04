<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use \DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employee.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
           'first_name'=>'required|max:6',
           'last_name'=>'required|max:60',
           'middle_name'=>'required|max:60',
           'address'=>'required|max:120',
           'department_id'=>'required|numeric',
           'city_id'=>'required|numeric',
           'state_id'=>'required|numeric',
           'country_id'=>'required|numeric',
           'zip'=>'required|numeric',
           'birthdate'=>'required|date',
           'date_hired'=>'required|date',
        ]);
        $employee = new Employee();
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->middle_name = $request->middle_name;
        $employee->address = $request->address;
        $employee->department_id = $request->department_id;
        $employee->city_id = $request->city_id;
        $employee->state_id = $request->state_id;
        $employee->country_id = $request->country_id;
        $employee->zip = $request->zip;
        $employee->birthdate = $request->birthdate;
        $employee->date_hired = $request->date_hired;
        $employee->save();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }

    public function all_employees(Request $request)
    {
        $employee = Employee::query()
            ->with('department', 'city', 'state', 'country')
            ->orderBy('id');
        if (isset($request->name)) {
            $employee->where(DB::raw("CONCAT(first_name,' ',last_name)"), 'like', "%$request->name%");
        }
        if (isset($request->department)) {
            $employee->whereHas('department', function ($q) use ($request) {
                return $q->where('name', 'like', "%$request->department%");
            });
        }

        return $employee->paginate(10);
    }
}
