<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use App\models\User;
use App\Rules\NotNumeric;

class UserController extends Controller
{

    public function index()
    {
        $defaultPaginate = config('paginate.size');
        $users = User::latest()->paginate($defaultPaginate);

        return Inertia::render('Backend/User/Index', [
            'users' => $users
        ]);
    }


    public function create()
    {
        return Inertia::render('Backend/User/Create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'             => ['required', new NotNumeric],
            'email'            => ['required', 'email', 'unique:users'],
            'password'         => ['required', 'min:8'],
            'confirm_password' => ['required_with:password', 'same:password', 'min:8']
        ]);

        $user           = new User();
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('users.index');
    }


    public function show($id)
    {
        return 'show';
    }


    public function edit($id)
    {
        $user = User::find($id);

        return Inertia::render('Backend/User/Edit',[
            'user' => $user
        ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', new NotNumeric],
            'email' => ['required', 'email', "unique:users,email,$id"]
        ]);

        $user        = User::find($id);
        $user->name  = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        return 'delete';
    }
}
