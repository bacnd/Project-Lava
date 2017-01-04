<?php

use Illuminate\Database\Seeder;
use App\NhanVien;

class NhanVienTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
    	NhanVien::create([

    		'userid' => '1',
    		'hoten' => 'Đặng Thanh Thương Thương',
    		'gioitinh' => '0',
    		'ngaysinh' => '1989-02-12',
    		'cmnd' => '220886638',
    		'dienthoai' => '0933988442',
    		'email' => 'thuongthuong@gmail.com',
    		'diachi' => '72-74 D13, p Tây Thạnh, q Tân Phú, HCM',
    		'macv' => 'nv',
    		'mapb' => 'seo',
    		'mabc' => 'cd',
    		'matt' => 'btg',
    		'ngaybatdaulamviec' => '2012-10-01',
            'luongcoban' => '5000000',
            'trocap' => '54567',
            'nghiphep' => '5',
            
    		]);

    	NhanVien::create([

    		'userid' => '2',
    		'hoten' => 'Dương Tấn Đạt',
    		'gioitinh' => '1',
    		'ngaysinh' => '1990-08-22',
    		'cmnd' => '201555618',
    		'dienthoai' => '0973480389',
    		'email' => 'tandat@gmail.com',
    		'diachi' => '175A Hoàng Diệu, Q Hải Châu, Tp Đà Nẵng',
    		'macv' => 'tl',
    		'mapb' => 'seo',
    		'mabc' => 'dh',
    		'matt' => 'ct',
    		'ngaybatdaulamviec' => '2013-02-25',
            'luongcoban' => '5000000',
            'trocap' => '45555',
            'nghiphep' => '5',
            
    		]);

    	NhanVien::create([

    		'userid' => '3',
    		'hoten' => 'Võ Ngọc Minh',
    		'gioitinh' => '1',
    		'ngaysinh' => '1886-10-04',
    		'cmnd' => '201555618',
    		'dienthoai' => '0907557220',
    		'email' => 'ngocminh@gmail.com',
    		'diachi' => 'q Tan Binh, tp HCM',
    		'macv' => 'tp', 
    		'mapb' => 'seo',
    		'mabc' => 'dh',
    		'matt' => 'ct',
    		'ngaybatdaulamviec' => '2013-02-25',
            'luongcoban' => '8000000',
            'trocap' => '200000',
            'nghiphep' => '5',
            
    		]);

    	NhanVien::create([

    		'userid' => '4',
    		'hoten' => 'Lê Thanh Tâm',
    		'gioitinh' => '1',
    		'ngaysinh' => '1886-10-04',
    		'cmnd' => '201555618',
    		'dienthoai' => '0907557220',
    		'email' => 'thanhtam@gmail.com',
    		'diachi' => 'q Tan Binh, tp HCM',
    		'macv' => 'tp', 
    		'mapb' => 'gd',
    		'mabc' => 'ts',
    		'matt' => 'ct',
    		'ngaybatdaulamviec' => '2013-02-25',
            'luongcoban' => '500000',
            'trocap' => '200000',
            'nghiphep' => '5',
            
    		]);

    	NhanVien::create([

    		'userid' => '5',
    		'hoten' => 'Lê Thị Mộng Thơ',
    		'gioitinh' => '0',
    		'ngaysinh' => '1886-10-04',
    		'cmnd' => '201555618',
    		'dienthoai' => '0907557220',
    		'email' => 'mongtho@gmail.com',
    		'diachi' => 'q Tan Binh, tp HCM',
    		'macv' => 'tp', 
    		'mapb' => 'kt',
    		'mabc' => 'dh',
    		'matt' => 'ct',
    		'ngaybatdaulamviec' => '2013-02-25',
            'luongcoban' => '500000',
            'trocap' => '200000',
            'nghiphep' => '5',
            
    		]);

    	NhanVien::create([

    		'userid' => '6',
    		'hoten' => 'Nguyễn Văn Hồ',
    		'gioitinh' => '1',
    		'ngaysinh' => '1886-10-04',
    		'cmnd' => '201555618',
    		'dienthoai' => '0907557220',
    		'email' => 'vanho@gmail.com',
    		'diachi' => 'q Tan Binh, tp HCM',
    		'macv' => 'nv', 
    		'mapb' => 'kt',
    		'mabc' => 'tc',
    		'matt' => 'ct',
    		'ngaybatdaulamviec' => '2013-02-25',
            'luongcoban' => '500000',
            'trocap' => '200000',
            'nghiphep' => '5',
            
    		]);

    	NhanVien::create([

    		'userid' => '7',
    		'hoten' => 'Phạm Hoàng Thảo Nhi',
    		'gioitinh' => '0',
    		'ngaysinh' => '1886-10-04',
    		'cmnd' => '201555618',
    		'dienthoai' => '0907557220',
    		'email' => 'thaonhi@gmail.com',
    		'diachi' => 'q Tan Binh, tp HCM',
    		'macv' => 'tp', 
    		'mapb' => 'kd',
    		'mabc' => 'dh',
    		'matt' => 'ct',
    		'ngaybatdaulamviec' => '2013-02-25',
            'luongcoban' => '500000',
            'trocap' => '200000',
            'nghiphep' => '5',
            
    		]);

    	NhanVien::create([

    		'userid' => '8',
    		'hoten' => 'Huỳnh Thị Huệ',
    		'gioitinh' => '0',
    		'ngaysinh' => '1886-10-04',
    		'cmnd' => '201555618',
    		'dienthoai' => '0907557220',
    		'email' => 'thihue@gmail.com',
    		'diachi' => 'q Tan Binh, tp HCM',
    		'macv' => 'nv', 
    		'mapb' => 'kd',
    		'mabc' => 'dh',
    		'matt' => 'ct',
    		'ngaybatdaulamviec' => '2013-02-25',
            'luongcoban' => '500000',
            'trocap' => '200000',
            'nghiphep' => '5',
            
    		]);

    	NhanVien::create([

    		'userid' => '8',
    		'hoten' => 'Phương Thị Phượng',
    		'gioitinh' => '0',
    		'ngaysinh' => '1886-10-04',
    		'cmnd' => '201555618',
    		'dienthoai' => '0907557220',
    		'email' => 'thiphuong@gmail.com',
    		'diachi' => 'q Tan Binh, tp HCM',
    		'macv' => 'tp', 
    		'mapb' => 'kth',
    		'mabc' => 'cd',
    		'matt' => 'tv',
    		'ngaybatdaulamviec' => '2013-02-25',
            'luongcoban' => '500000',
            'trocap' => '200000',
            'nghiphep' => '5',
            
    		]);

    	NhanVien::create([

    		'userid' => '9',
    		'hoten' => 'Trần văn Hùng',
    		'gioitinh' => '1',
    		'ngaysinh' => '1886-10-04',
    		'cmnd' => '201555618',
    		'dienthoai' => '0907557220',
    		'email' => 'vanghung@gmail.com',
    		'diachi' => 'q Tan Binh, tp HCM',
    		'macv' => 'nv', 
    		'mapb' => 'kth',
    		'mabc' => 'dh',
    		'matt' => 'ct',
    		'ngaybatdaulamviec' => '2013-02-25',
            'luongcoban' => '500000',
            'trocap' => '200000',
            'nghiphep' => '5',
            
    		]);

        NhanVien::create([

            'userid' => '10',
            'hoten' => 'Nguyễn Thị Bảo Trâm',
            'gioitinh' => '0',
            'ngaysinh' => '1886-10-04',
            'cmnd' => '201555618',
            'dienthoai' => '0907557220',
            'email' => 'baotram@gmail.com',
            'diachi' => 'q Tan Binh, tp HCM',
            'macv' => 'tp', 
            'mapb' => 'tk',
            'mabc' => 'cd',
            'matt' => 'ct',
            'ngaybatdaulamviec' => '2013-02-25',
            'luongcoban' => '500000',
            'trocap' => '200000',
            'nghiphep' => '5',
            
            ]);

        NhanVien::create([

            'userid' => '11',
            'hoten' => 'Nguyễn Thị Nhị',
            'gioitinh' => '0',
            'ngaysinh' => '1886-10-04',
            'cmnd' => '201555618',
            'dienthoai' => '0907557220',
            'email' => 'vanghung@gmail.com',
            'diachi' => 'q Tan Binh, tp HCM',
            'macv' => 'nv', 
            'mapb' => 'tk',
            'mabc' => 'dh',
            'matt' => 'ct',
            'ngaybatdaulamviec' => '2013-02-25',
            'luongcoban' => '500000',
            'trocap' => '200000',
            'nghiphep' => '5',
            
            ]);

    }
}
