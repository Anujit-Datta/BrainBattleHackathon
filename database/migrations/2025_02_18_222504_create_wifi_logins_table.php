<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

return new class extends Migration

{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('wifi_logins', function (Blueprint $table) {
            $table->id();
            $table->string('student_id');
            $table->dateTime('timestamp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wifi_logins');
    }
};
