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
        
            $table->increments('appID');
            $table->integer('vendorSelect');
            $table->date('dateRentFrom');
            $table->date('dateRentTo');
            $table->string('bizName');
            $table->string('ssmNo');
            $table->string('bizType');
            $table->string('appStatus')->default("Applied");
            


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
