<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChucVu;

class ChucvuController extends Controller
{
    public function index() {

    	$chucvulist = ChucVu::all();

    	return view('chucvu.index', compact('chucvulist'));
    }

    public function create() {
        return view('chucvu.create');
    }

    public function store(Request $request) {

        ChucVu::Create([

            'macv' => $request['macv'],
            'tenphongban' => $request['phongban'],

            ]);

        return redirect(route('chucvu.home'));
    }

    public function edit($macv) {

        $pb = ChucVu::find($macv);

        return view('chucvu.edit', compact('pb'));

    }

    public function update($macv, Request $request) {

        $pb = ChucVu::find($macv);

        $pb->tenphongban = $request['phongban'];
        $pb->save();

        return redirect(route('chucvu.home'));

    }

    public function delete($macv) {

        $pb = ChucVu::find($macv);
        $pb->delete();

        return redirect(route('chucvu.home')); 

    }

}
