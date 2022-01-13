<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();

            $table->date('created_date_by_proj')->nullable();
            $table->date('generated_date_by_proj')->nullable();
            $table->date('accepted_date_by_head')->nullable();
            $table->date('accepted_date_by_stat')->nullable();
            $table->integer('no');
            $table->string('invoice_title');
            $table->string('invoicerefnumber')->nullable();
            $table->boolean('generated_invoice')->default(0);
            $table->boolean('received_invoice_stat')->default(0);
            $table->boolean('received_invoice_by_head')->default(0);
            $table->unsignedBigInteger('school_id')->nullable();
            $table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade');
            $table->unsignedBigInteger('council_id')->nullable();
            $table->foreign('council_id')->references('id')->on('councils')->onDelete('cascade');
            $table->unsignedBigInteger('book_id')->nullable();
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
            $table->unsignedBigInteger('region_id')->nullable();
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');
            $table->unsignedBigInteger('book_category_id')->nullable();
            $table->foreign('book_category_id')->references('id')->on('book_categories')->onDelete('cascade');
            $table->unsignedBigInteger('standard_id')->nullable();
            $table->foreign('standard_id')->references('id')->on('standards')->onDelete('cascade');
            $table->string('projectmanagerinsert')->nullable();
            $table->unsignedBigInteger('projectmanager_id')->nullable();
            $table->foreign('projectmanager_id')->references('id')->on('projectmanagers')->onDelete('cascade');


            $table->unsignedBigInteger('statisticalofficer_id')->nullable();
            $table->foreign('statisticalofficer_id')->references('id')->on('statisticalofficers')->onDelete('cascade');
            $table->unsignedBigInteger('headmaster_id')->nullable();
            $table->foreign('headmaster_id')->references('id')->on('headmasters')->onDelete('cascade');
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
        Schema::dropIfExists('invoices');
    }
}
