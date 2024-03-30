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
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('service_id');
            $table->string('service_title')->nullable();
            $table->string('service_subtitle')->nullable();
            $table->string('service_details')->nullable();
            $table->string('service_icon')->nullable();
            $table->string('service_image')->nullable();
            $table->string('service_url')->nullable();
            $table->string('service_order')->nullable();
            $table->integer('service_feature')->default(1);
            $table->integer('service_publish')->default(1);
            $table->string('service_slug')->nullable();
            $table->integer('service_creator')->nullable();
            $table->integer('service_editor')->nullable();
            $table->integer('service_status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
