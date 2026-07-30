<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('availability_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('locker_id')->constrained()->onDelete('cascade');
            $table->string('size', 1);
            $table->string('status', 10);
            $table->text('comment')->nullable();
            $table->string('nickname', 30)->default('匿名');
            $table->string('ip_hash', 64);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('availability_reports');
    }
};
