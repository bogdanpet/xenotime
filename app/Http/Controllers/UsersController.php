<?php

namespace App\Http\Controllers;

use App\Datatables\UsersDatatable;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(UsersDatatable $datatable)
    {
        $users = User::paginate();
        $datatable->setData($users);

        return view('admin.users.index', compact('datatable', 'users'));
    }

    public function show($id)
    {
        $user = User::whereId($id)->first();

        return view('admin.users.profile', compact('user'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required|regex:/^[(a-zA-Z\s)]+$/u|min:2|max:255',
            'email'    => 'required|unique:users|email|max:255',
            'password' => 'required|confirmed|min:6'
        ]);

        $inputs = $request->all();

        $inputs['password'] = bcrypt($inputs['password']);

        User::create($inputs);

        return redirect(admin_url('users'));
    }

    public function edit($id)
    {
        $user = User::whereId($id)->first();

        return view('admin.users.edit', compact('user'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name'     => 'required|regex:/^[(a-zA-Z\s)]+$/u|min:2|max:255',
            'email'    => 'required|unique:users|email|max:255',
            'password' => 'confirmed|min:6'
        ]);

        $inputs = $request->all();

        unset($inputs['_token']);
        unset($inputs['password_confirmation']);

        $inputs['password'] = bcrypt($inputs['password']);

        User::whereId($id)->update($inputs);

        return redirect(admin_url('users'));
    }

    public function delete($id)
    {
        User::whereId($id)->delete();

        return redirect(admin_url('users'));
    }
}
