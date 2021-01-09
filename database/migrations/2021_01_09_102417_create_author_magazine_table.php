<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorMagazineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('author_magazine', function (Blueprint $table) {
            $table->unsignedBigInteger('author_id')->unsigned();
            $table->unsignedBigInteger('magazine_id')->unsigned();

            $table->unique(['author_id', 'magazine_id']);
            $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
            $table->foreign('magazine_id')->references('id')->on('magazines')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('author_magazine', function (Blueprint $table) {
            //
        });
    }
}
