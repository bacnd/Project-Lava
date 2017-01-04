<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhanvienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhanvien', function (Blueprint $table) {
            $table->increments('manv');
            $table->integer('userid');
            $table->string('avatar')->default('noimage.gif');
            $table->string('hoten');
            $table->binary('gioitinh');
            $table->date('ngaysinh');
            $table->string('cmnd');
            $table->string('dienthoai');
            $table->string('email')->nullable();
            $table->string('diachi')->nullable();
            $table->string('macv');
            $table->string('mapb');
            $table->string('motacongviec')->nullable();
            $table->string('mabc');
            $table->string('matt');
            $table->date('ngaybatdaulamviec');
            $table->string('luongcoban');
            $table->string('trocap');
            $table->string('nghiphep');
            $table->string('ghichu')->nullable();
            // $table->primary('manv');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('nhanvien');
    }
}
