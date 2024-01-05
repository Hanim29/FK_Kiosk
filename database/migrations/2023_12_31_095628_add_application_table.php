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
        Schema::create('applications', function (Blueprint $table) {
            $table->string('appID', 20)->primary(); //primary key
            $table->integer("vendorSelect");
            $table->date("dateRentFrom");
            $table->date("dateRentTo");
            $table->string("bizName", 20);
            $table->string("ssmNo", 20);
            $table->string("bizType", 20);
            $table->string("appStatus", 20);
            

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
