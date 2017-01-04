<?php

use Illuminate\Database\Seeder;
use App\ChucVu;

class ChucVuTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ChucVu::create([

        	'macv' => 'gd',
        	'chucvu' => 'Giám đốc',

        	]);

        ChucVu::create([

        	'macv' => 'tp',
        	'chucvu' => 'Trưởng phòng',

        	]);

        ChucVu::create([

        	'macv' => 'tl',
        	'chucvu' => 'Trợ lý',

        	]);

        ChucVu::create([

        	'macv' => 'nv',
        	'chucvu' => 'Nhân viên',

        	]);
    }
}
