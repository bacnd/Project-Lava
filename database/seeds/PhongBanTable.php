<?php

use Illuminate\Database\Seeder;
use App\PhongBan;

class PhongBanTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PhongBan::create([

        	'mapb' => 'seo',
        	'tenphongban' => 'SEO',

        	]);

        PhongBan::create([

        	'mapb' => 'kt',
        	'tenphongban' => 'Kế Toán',

        	]);

        PhongBan::create([

        	'mapb' => 'tk',
        	'tenphongban' => 'Thiết kế',

        	]);

        PhongBan::create([

        	'mapb' => 'kd',
        	'tenphongban' => 'Kinh doanh',

        	]);

        PhongBan::create([

        	'mapb' => 'kth',
        	'tenphongban' => 'Kỹ thuật',

        	]);

        PhongBan::create([

        	'mapb' => 'gd',
        	'tenphongban' => 'Giám đốc',

        	]);

    }
}
