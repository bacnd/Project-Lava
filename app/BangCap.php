<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BangCap extends Model
{
	public $timestamps = false;
	public $incrementing = false;
	public $primaryKey = 'mabc';
    protected $table = 'bangcap';
    protected $fillable = ['mabc', 'bangcap'];
}
