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
        Schema::create('details', function (Blueprint $table) {
            $table->integer('detail_trans_id');
            $table->integer('detail_mn_id');
            $table->integer('detail_mn_harga');
            $table->integer('detail_qty');
            $table->integer('detail_status');
            $table->timestamps();
            $table->index(['detail_trans_id','detail_mn_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('details');
    }
};
