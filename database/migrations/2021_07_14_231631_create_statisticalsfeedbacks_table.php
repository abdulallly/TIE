<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatisticalsfeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statisticalsfeedbacks', function (Blueprint $table) {
            $table->id();
            $table->string('answer')->nullable();
            $table->string('qstn');
            $table->unsignedBigInteger('council_id')->nullable();
            $table->foreign('council_id')->references('id')->on('councils')->onDelete('cascade');
            $table->unsignedBigInteger('region_id')->nullable();
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');
            $table->unsignedBigInteger('statisticalofficer_id')->nullable();
            $table->foreign('statisticalofficer_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('statisticalsfeedbacks');
    }
}
