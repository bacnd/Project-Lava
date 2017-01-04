<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BangCap;

class BangcapController extends Controller
{
    public function index() {

    	$bangcaplist = BangCap::all();

    	return view('bangcap.index', compact('bangcaplist'));
    }

    public function create() {
        return view('bangcap.create');
    }

    public function store(Request $request) {

        BangCap::Create([

            'mabc' => $request['mabc'],
            'bangcap' => $request['bangcap'],

            ]);

        return redirect(route('bangcap.home'));
    }

    public function edit($mabc) {

        $bc = BangCap::find($mabc);

        return view('bangcap.edit', compact('bc'));

    }

    public function update($mabc, Request $request) {

        $bc = BangCap::find($mabc);

        $bc->bangcap = $request['bangcap'];
        $bc->save();

        return redirect(route('bangcap.home'));

    }

    public function delete($mabc) {

        $bc = BangCap::find($mabc);
        $bc->delete();

        return redirect(route('bangcap.home')); 

    }

}
