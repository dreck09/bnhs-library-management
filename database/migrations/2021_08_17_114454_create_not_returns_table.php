<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotReturnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('not_returns', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('issue_id');
            $table->dateTime('report_on');
            $table->integer('qty');
            $table->integer('fines');
            $table->string('remarks');
            $table->foreign('issue_id')->references('id')->on('issue_books')->onDelete('cascade');
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
        Schema::dropIfExists('not_returns');
    }
}
