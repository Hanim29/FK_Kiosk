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
        Schema::create('kiosk_participants', function (Blueprint $table) {
            $table->bigIncrements("participant_ID");
            $table->bigInteger('appID')->unsigned();
            $table->unsignedBigInteger('user_ID');

            $table->foreign('appID')->references('appID')->on('applications')->onDelete('cascade');
            $table->foreign('user_ID')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kiosk_participants');
    }
};
