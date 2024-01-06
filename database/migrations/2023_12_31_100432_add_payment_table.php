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
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('paymentID'); // Primary Key
            $table->bigInteger('appID')->unsigned();
            $table->string('appNum',20);
            $table->string('phoneNum',20);
            $table->string('email',20);
            $table->dateTime('payDate');
            $table->string('kioskNum' ,20);
            $table->decimal('totalPay', 10, 2);
            $table->string('payMethod' ,20);
            
            // Foreign key constraints
            $table->foreign('appID')->references('appID')->on('applications')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
