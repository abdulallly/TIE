<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeadmastersfeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('headmastersfeedbacks', function (Blueprint $table) {
            $table->id();
            $table->string('answer')->nullable();
            $table->string('qstn');
            $table->unsignedBigInteger('school_id')->nullable();
            $table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade');
            $table->unsignedBigInteger('council_id')->nullable();
            $table->foreign('council_id')->references('id')->on('councils')->onDelete('cascade');
            $table->unsignedBigInteger('region_id')->nullable();
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');
            $table->unsignedBigInteger('headmaster_id')->nullable();
            $table->foreign('headmaster_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('headmastersfeedbacks');
    }
}
