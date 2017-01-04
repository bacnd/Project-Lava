<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PhongBan;

class PhongbanController extends Controller
{
    public function index() {

    	$phongbanlist = PhongBan::all();

    	return view('phongban.index', compact('phongbanlist'));
    }

    public function create() {
        return view('phongban.create');
    }

    public function store(Request $request) {

        PhongBan::Create([

            'mapb' => $request['mapb'],
            'tenphongban' => $request['phongban'],

            ]);

        return redirect(route('phongban.home'));
    }

    public function edit($mapb) {

        $pb = PhongBan::find($mapb);

        return view('phongban.edit', compact('pb'));

    }

    public function update($mapb, Request $request) {

        $pb = PhongBan::find($mapb);

        $pb->tenphongban = $request['phongban'];
        $pb->save();

        return redirect(route('phongban.home'));

    }

    public function delete($mapb) {

        $pb = PhongBan::find($mapb);
        $pb->delete();

        return redirect(route('phongban.home')); 

    }

}
