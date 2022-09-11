<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClaimsTable extends Migration
{
    public function up()
    {
        Schema::create('claims', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('serial')->nullable();
            $table->string('claim_account')->nullable();
            $table->datetime('claimed_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
