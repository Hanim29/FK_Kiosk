<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->bigIncrements('salesID'); //primary key
            $table->bigInteger('appID')->unsigned();
            $table->string('userID', 20);
            $table->date('saleDate');
            $table->string('kioskNum', 20);
            $table->double('totalSales'); 
            $table->string('comment', 20);
            // continue add your columns here

            $table->foreign('appID')->references('appID')->on('applications')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
