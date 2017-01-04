<?php

use Illuminate\Database\Seeder;
use App\BangCap;

class BangCapTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BangCap::create([

        	'mabc' => 'dh',
        	'bangcap' => 'Đại học',

        	]);

        BangCap::create([

        	'mabc' => 'cd',
        	'bangcap' => 'Cao đẳng',

        	]);

        BangCap::create([

        	'mabc' => 'tc',
        	'bangcap' => 'Trung cấp',

        	]);

        BangCap::create([

        	'mabc' => 'ts',
        	'bangcap' => 'Thạc sĩ',

        	]);

        BangCap::create([

        	'mabc' => 'kh',
        	'bangcap' => 'Khác',

        	]);
    }
}
