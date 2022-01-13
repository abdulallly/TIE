<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookrequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookrequests', function (Blueprint $table) {
            $table->id();
            $table->integer('requested_quantity')->nullable();
            $table->unsignedBigInteger('book_category_id')->nullable();
            $table->foreign('book_category_id')->references('id')->on('book_categories')->onDelete('cascade');
            $table->unsignedBigInteger('book_id')->nullable();
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
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
        Schema::dropIfExists('bookrequests');
    }
}
