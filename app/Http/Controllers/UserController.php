<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DateTime;

class UserController extends Controller
{
    public function index() {

    	$users = User::paginate(10); // Phân trang

    	return view('user.index', compact('users'));
    }

    public function create() {

        return view('user.create');
    }

    public function store(Request $request) {

    	User::create([

    		'name' => $request['name'],
			'password' => bcrypt($request['password']),
			'email' => $request['email'],
			'role' => $request['role'],
			'ngaydangky' => new DateTime(),

    		]);

    	return redirect(route('user'));
    }

    public function edit($id) {

    	$user = User::find($id);
    	return view('user.edit', compact('user'));

    }

    public function update($id, Request $request) {

    	$user = User::find($id);
    	$user->name = $request['name'];
    	$user->password = bcrypt($request['password']);
    	$user->email = $request['email'];
    	$user->role = $request['role'];

    	$user->save();

    	return redirect(route('user'));

    }

    public function destroy($id) {

    	$user = User::find($id);
    	$user->delete();

    	return redirect(route('user'));   	
    }

}
