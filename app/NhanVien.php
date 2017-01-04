<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
	public $timestamps = false;
    protected $table = 'nhanvien';
	public $primaryKey = 'manv';
	protected $fillable = ['userid', 'hoten', 'avatar', 'gioitinh', 'ngaysinh', 'cmnd', 'dienthoai', 'email', 'diachi', 'macv', 'mapb', 'mabc', 'matt', 'ngaybatdaulamviec', 'ghichu'];
}
