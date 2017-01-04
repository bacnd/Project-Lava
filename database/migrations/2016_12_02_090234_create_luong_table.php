<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLuongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('luong', function (Blueprint $table) {

            $table->increments('id');
            $table->string('manv');
            $table->date('ngay');
            $table->string('luongcoban');
            $table->string('trocap');
            $table->string('ngaycong');
            $table->string('ngayphep');
            $table->string('ngaynghi');
            $table->string('tangcathuong');
            $table->string('tangcacn');
            $table->string('tangcale');
            $table->string('luongthucnhan');
            // $table->primary('id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
