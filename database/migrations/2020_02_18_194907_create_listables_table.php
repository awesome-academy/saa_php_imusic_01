<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listables', function (Blueprint $table) {
            $table->bigInteger('song_id');
            $table->bigInteger('listable_id');
            $table->string('listable_type');
            $table->primary(['song_id', 'listable_id', 'listable_type']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listables');
    }
}
