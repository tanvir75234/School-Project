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
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('client_id');
            $table->string('client_name')->nullable();
            $table->string('client_url')->nullable();
            $table->string('client_logo')->nullable();
            $table->string('client_order')->nullable();
            $table->string('client_slug')->nullable();
            $table->integer('client_creator')->nullable();
            $table->integer('client_editor')->nullable();
            $table->integer('client_publish')->default(1);
            $table->integer('client_status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
