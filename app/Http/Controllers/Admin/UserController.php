<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class UserController extends Controller
{

    public function index(Request $request){

        $keyword = $request->search;    

        $query = User::where('name', 'like', '%'.$keyword.'%')->orderBy('id', 'desc');   
        $userCounts = $query->count();
        $limit = 10;

        $users = $query->paginate($limit);

        return view('admin.pages.users.user', compact('users', 'userCounts', 'limit'));

    }

    public function create(){

        return view('admin.pages.users.create');
    }

    public function store(Request $request){

        $users = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->name),
        ]);
        return redirect()->route('list-user')->with('success','User Created Successfully.');
    }

    public function edit($id){

        $user = User::find($id);
        return view('admin.pages.users.edit', compact('user'));
    }

    public function update(Request $request, $id){

        $users = User::find($id);
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->password = $request->input('password');
        $users->update();
        return redirect()->route('list-user')->with('success','User Updated Successfully.');
    }

    public function destroy($id){

        $users = User::find($id);
        $users->delete();
        return redirect()->route('list-user')->with('success','User Deleted Successfully.');
    }

}
