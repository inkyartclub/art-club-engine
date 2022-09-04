<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNftsTable extends Migration
{
    public function up()
    {
        Schema::create('nfts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('total_to_mint')->nullable();
            $table->string('total_minted')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
