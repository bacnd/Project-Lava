<?php

use Illuminate\Database\Seeder;
use App\TinhTrangLamViec;

class TinhTrangLamViecTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TinhTrangLamViec::create([

        	'matt' => 'tv',
        	'tinhtranglamviec' => 'Thử việc',

        	]);

        TinhTrangLamViec::create([

        	'matt' => 'ct',
        	'tinhtranglamviec' => 'Chính thức',

        	]);

        TinhTrangLamViec::create([

        	'matt' => 'btg',
        	'tinhtranglamviec' => 'Bán thời gian',

        	]);

        TinhTrangLamViec::create([

        	'matt' => 'nv',
        	'tinhtranglamviec' => 'Nghỉ việc',

        	]);
    }
}
