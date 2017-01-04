<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChucVu extends Model
{
	public $timestamps = false;
	public $incrementing = false;
	public $primaryKey = 'macv';
    protected $table = 'chucvu';
    protected $fillable = ['macv', 'chucvu'];
}
