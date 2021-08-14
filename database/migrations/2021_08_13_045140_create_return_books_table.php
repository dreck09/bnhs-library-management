<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReturnBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('return_books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('issue_id');
            $table->dateTime('return_on');
            $table->dateTime('lapse_date');
            $table->integer('fines');
            $table->integer('remarks');
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
        Schema::dropIfExists('return_books');
    }
}
