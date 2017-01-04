<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhongBan extends Model
{
	public $timestamps = false;
	public $incrementing = false;
	public $primaryKey = 'mapb';
    protected $table = 'phongban';
    protected $fillable = ['mapb', 'tenphongban'];
}
