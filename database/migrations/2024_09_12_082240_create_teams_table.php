<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('position')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->enum('status',['Active','InActive','Blocked'])->default('Active');
            $table->enum('gender',['Female','Male']);
            $table->foreignId('role_id');
            $table->foreign('role_id')->references('id')->on('roles');
            $table->string('linkedin')->nullable();
            $table->string('github')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('facebook')->nullable();
            $table->string('x')->nullable();
            $table->string('image');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
