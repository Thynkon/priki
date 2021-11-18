<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicationstatetransitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publicationstatetransitions', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('from_id')->index('fk_opinionstatetransitions_opinionstates1_idx');
            $table->integer('to_id')->index('fk_publicationstatetransitions_publicationstates2_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publicationstatetransitions');
    }
}
