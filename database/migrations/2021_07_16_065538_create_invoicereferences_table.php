<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicereferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoicereferences', function (Blueprint $table) {
            $table->id();
            $table->string('invoicerefnumber');
            $table->date('generated_date_by_proj')->nullable();
            $table->date('accepted_date_by_stat')->nullable();
            $table->boolean('received_invoice_stat')->default(0);
            $table->unsignedBigInteger('council_id')->nullable();
            $table->foreign('council_id')->references('id')->on('councils')->onDelete('cascade');
            $table->unsignedBigInteger('projectmanager_id')->nullable();
            $table->foreign('projectmanager_id')->references('id')->on('projectmanagers')->onDelete('cascade');
            $table->unsignedBigInteger('statisticalofficer_id')->nullable();
            $table->foreign('statisticalofficer_id')->references('id')->on('statisticalofficers')->onDelete('cascade');
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
        Schema::dropIfExists('invoicereferences');
    }
}
