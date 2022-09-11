<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectionsTable extends Migration
{
    public function up()
    {
        Schema::create('collections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('symbol');
            $table->string('name');
            $table->string('supply')->nullable();
            $table->float('royalty_fee', 3, 2);
            $table->string('token')->nullable();
            $table->string('image_url')->nullable();
            $table->datetime('release_at');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
