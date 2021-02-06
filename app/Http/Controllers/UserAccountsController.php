<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class UserAccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
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
            'username' => 'required|max:20',
            'last_name' => 'required|max:60',
            'first_name' => 'required|max:60',
            'email' => 'email|required|max:60',
        ]);

        $user = new User();
        $user->username = $request->username;
        $user->last_name = $request->last_name;
        $user->first_name = $request->first_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect("/user");
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'username' => 'required|max:20',
            'last_name' => 'required|max:60',
            'first_name' => 'required|max:60',
            'email' => 'email|required|max:60',
        ]);

        $user->username = $request->username;
        $user->last_name = $request->last_name;
        $user->first_name = $request->first_name;
        $user->email = $request->email;
        $user->save();

        return redirect("user/{$user->id}/edit");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = DB::table('users')->where('id', $id);
        if (Auth::user()->id != $user->first()->id) {
            $user->update(['deleted_at' => Carbon::now()]);
            return redirect('/user');
        }

        return back()->with('status', 'cannot delete current user');
    }

    public function search(Request $request)
    {
        $users = DB::table('users')
            ->select(['id', 'username', 'first_name', 'last_name', 'email'])
            ->whereNull('deleted_at');
        return Datatables::of($users)
            ->filter(function ($query) use ($request) {

                if ($request->has('username')) {
                    $query->where('username', 'like', "%{$request->get('username')}%");
                }
                if ($request->has('email')) {
                    $query->where('email', 'like', "%{$request->get('email')}%");
                }
            })
            ->addColumn('action', function ($row) {

                $btn = '<span class="px-2 d-inline-flex"><form method="get" action="' . url('/user/' . $row->id . '/edit') . '" ><input type="submit" class="edit btn btn-primary btn-sm" value="Edit"></form></span>';
                $btn .= '<a data-toggle="modal" data-target="#deleteModel" onclick="$(\'#delete-form\').attr(\'action\',\'' . url('user/' . $row->id) . '\'); console.log(\'' . url('user/' . $row->id) . '\');$(\'#delete\').modal().show();" class="edit btn btn-danger btn-sm">Delete</a>';

                return $btn;
            })
            ->make(true);
    }

    public function pwchange(Request $request, User $user)
    {

        $this->validate($request, [
            'password' => 'required|confirmed',
        ]);

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect("user/{$user->id}/edit");

    }
}
