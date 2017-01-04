<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Luong extends Model
{
    public $timestamps = false;
	public $primaryKey = 'id';
    protected $table = 'luong';
    protected $fillable = ['manv', 'ngay', 'luongcoban', 'trocap', 'ngaycong', 'ngayphep', 'ngaynghi', 'tangcathuong', 'tangcacn', 'tangcale', 'luongthucnhan'];
}
