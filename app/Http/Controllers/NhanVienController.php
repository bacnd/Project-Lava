<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\NhanVien;
use App\ChucVu;
use App\PhongBan;
use App\User;
use App\TinhTrangLamViec;
use App\BangCap;
use Image;

class NhanVienController extends Controller
{
    public function index() {

    	$nhanvienlist = NhanVien::paginate(10); // Phân trang
    	$chucvu = new ChucVu;
    	$phongban = new PhongBan;
        $user = new User;

    	return view('nhanvien.index', compact('nhanvienlist', 'chucvu', 'phongban', 'user'));
    }

    public function show($id) {

    	$nhanvien = NhanVien::where('userid', $id)->first();
    	$chucvu = new ChucVu;
    	$phongban = PhongBan::find($nhanvien->mapb)->tenphongban;
    	$nvcphongban = NhanVien::where('mapb', $nhanvien->mapb)
    	->where('manv', '!=', $nhanvien->manv)->get();

    	return view('nhanvien.show', compact('nhanvien', 'chucvu', 'phongban', 'nvcphongban'));
    }

    public function updateshow($id, Request $request) {
        $this->validate($request, [
            'NhanvienAvatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $nhanvien = NhanVien::find($id);

        if($request->hasFile('NhanvienAvatar')) {

            $avatar = $request->file('NhanvienAvatar');
            $filename = Auth::User()->name . '_' . $id . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar->getRealPath())->save(public_path('/asset/images/avatar/' . $filename) );

            $request['avatar'] = $filename;

        } else $request['avatar'] = $nhanvien->avatar;

        $nhanvien->avatar = $request['avatar'];
        $nhanvien->hoten = $request['hoten'];
        $nhanvien->ngaysinh = $request['ngaysinh'];
        $nhanvien->email = $request['email'];
        $nhanvien->cmnd = $request['cmnd'];
        $nhanvien->dienthoai = $request['dienthoai'];
        $nhanvien->diachi = $request['diachi'];

        $nhanvien->save();

        return redirect( route('nhanvien.show', $id) );
    }

    public function create() {

    	$users = User::all();
    	$userIDcurrent = Auth::User()->id;
    	$tinhtranglamviec = TinhTrangLamViec::all();
    	$bangcap = BangCap::all();
    	$chucvu = ChucVu::all();
    	$phongban = PhongBan::all();

    	return view('nhanvien.create', compact('users', 'userIDcurrent', 'tinhtranglamviec', 'bangcap', 'chucvu', 'phongban'));

    }

    public function store(Request $request) {

    	$this->validate($request, [
            'NhanvienAvatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

    	$nhanvien = NhanVien::create([

    		'userid' => $request['userid'],
    		'hoten' => $request['hoten'],
    		'gioitinh' => $request['gioitinh'],
    		'ngaysinh' => $request['ngaysinh'],
    		'cmnd' => $request['cmnd'],
    		'dienthoai' => $request['dienthoai'],
    		'email' => $request['email'],
    		'diachi' => $request['diachi'],
    		'macv' => $request['chucvu'],
    		'mapb' => $request['phongban'],
    		'mabc' => $request['bangcap'],
    		'matt' => $request['tinhtrang'],
            'ngaybatdaulamviec' => $request['ngaybatdaulamviec'],
            'luongcoban' => $request['luongcoban'],
    		'trocap' => $request['trocap'],
    		'ghichu' => $request['ghichu'],

    		]);

    	if($request->hasFile('NhanvienAvatar')) {

    		$avatar = $request->file('NhanvienAvatar');
    		$filename = Auth::User()->name . '_' . $nhanvien->manv . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar->getRealPath())->save(public_path('/asset/images/avatar/' . $filename) );

    		$request['avatar'] = $filename;

    	} else $request['avatar'] = 'noimage.gif';

    	$upAvatar = NhanVien::find($nhanvien->manv);
    	$upAvatar->avatar = $request['avatar'];
    	$upAvatar->save();

    	return redirect(route('nhanvien.show', $nhanvien->manv));

    }

    public function edit($id) {

    	$nhanvien = NhanVien::find($id);
    	$users = User::all();
    	$tinhtranglamviec = TinhTrangLamViec::all();
    	$bangcap = BangCap::all();
    	$chucvu = ChucVu::all();
    	$phongban = PhongBan::all();
    	return view('nhanvien.edit', compact('nhanvien', 'users', 'tinhtranglamviec', 'bangcap', 'chucvu', 'phongban'));

    }

    public function update($id, Request $request) {

    	$this->validate($request, [
            'NhanvienAvatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

		$nhanvien = NhanVien::find($id);

    	if($request->hasFile('NhanvienAvatar')) {

    		$avatar = $request->file('NhanvienAvatar');
    		$filename = Auth::User()->name . '_' . $id . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar->getRealPath())->save(public_path('/asset/images/avatar/' . $filename) );

    		$request['avatar'] = $filename;

    	} else $request['avatar'] = $nhanvien->avatar;
    	
    	$nhanvien->userid = $request['userid'];

    	$nhanvien->avatar = $request['avatar'];
    	$nhanvien->hoten = $request['hoten'];
    	$nhanvien->ngaysinh = $request['ngaysinh'];
    	$nhanvien->email = $request['email'];
    	$nhanvien->cmnd = $request['cmnd'];
    	$nhanvien->dienthoai = $request['dienthoai'];
    	$nhanvien->diachi = $request['diachi'];

    	$nhanvien->gioitinh = $request['gioitinh'];
    	$nhanvien->ngaybatdaulamviec = $request['ngaybatdaulamviec'];
    	$nhanvien->matt = $request['tinhtrang'];
    	$nhanvien->mabc = $request['bangcap'];
    	$nhanvien->macv = $request['chucvu'];
        $nhanvien->ghichu = $request['ghichu'];
        $nhanvien->luongcoban = $request['luongcoban'];
    	$nhanvien->trocap = $request['trocap'];

    	$nhanvien->save();

    	return redirect( route('nhanvien.show', $id) );

    }
}
