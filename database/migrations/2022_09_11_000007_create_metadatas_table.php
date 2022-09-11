<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetadatasTable extends Migration
{
    public function up()
    {
        Schema::create('metadatas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('creator')->nullable();
            $table->string('description')->nullable();
            $table->string('cid');
            $table->string('type');
            $table->string('generated_cid')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
