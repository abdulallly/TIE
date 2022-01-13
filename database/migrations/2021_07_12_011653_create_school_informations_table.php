<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_informations', function (Blueprint $table) {
            $table->id();
            $table->integer('male')->nullable();
            $table->integer('female')->nullable();
            $table->unsignedBigInteger('standard_id')->nullable();
            $table->foreign('standard_id')->references('id')->on('standards')->onDelete('cascade');
            $table->unsignedBigInteger('school_id')->nullable();
            $table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade');
            $table->unsignedBigInteger('council_id')->nullable();
            $table->foreign('council_id')->references('id')->on('councils')->onDelete('cascade');
            $table->unsignedBigInteger('region_id')->nullable();
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');
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
        Schema::dropIfExists('school_informations');
    }
}
