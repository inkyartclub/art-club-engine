<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToNftsTable extends Migration
{
    public function up()
    {
        Schema::table('nfts', function (Blueprint $table) {
            $table->unsignedBigInteger('collection_id')->nullable();
            $table->foreign('collection_id', 'collection_fk_7256935')->references('id')->on('collections');
            $table->unsignedBigInteger('metadata_id')->nullable();
            $table->foreign('metadata_id', 'metadata_fk_7256936')->references('id')->on('metadatas');
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_7256973')->references('id')->on('teams');
        });
    }
}
