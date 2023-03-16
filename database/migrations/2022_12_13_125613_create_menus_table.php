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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('mn_kd',5);
            $table->string('mn_nama',50);
            $table->integer('mn_cat_id');
            $table->integer('mn_harga');
            $table->string('mn_satuan',15);
            $table->enum('mn_stok',['A','NA']);
            $table->integer('mn_kitc_id');
            $table->longtext('mn_desc')->nullable();
            $table->text('foto')->nullable();
            $table->timestamps();
            $table->index(['mn_cat_id','mn_kitc_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
};
