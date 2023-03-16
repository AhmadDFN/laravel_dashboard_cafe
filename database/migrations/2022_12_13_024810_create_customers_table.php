<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('cus_kd',10);
            $table->string('cus_nm',50);
            $table->string('cus_alamat',100);
            $table->string('cus_kota',20);
            $table->integer('cus_telp');
            $table->integer('cus_jk')->default(1);
            $table->integer('cus_status')->default(2);
            $table->integer('cus_point');
            $table->integer('cus_user_id');
            $table->timestamps();
            $table->index('cus_user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
};
