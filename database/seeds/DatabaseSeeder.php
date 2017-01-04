<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(BangCapTable::class);
        $this->call(ChucVuTable::class);
        $this->call(NhanVienTable::class);
        $this->call(PhongBanTable::class);
        $this->call(TinhTrangLamViecTable::class);
    }
}
