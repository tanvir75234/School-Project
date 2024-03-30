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
        Schema::create('universities', function (Blueprint $table) {
            $table->bigIncrements('university_id');
            $table->integer('country_id')->nullable();
            $table->string('university_name')->nullable();
            $table->string('university_url')->nullable();
            $table->string('university_logo')->nullable();
            $table->integer('university_order')->nullable();
            $table->integer('university_creator')->nullable();
            $table->integer('university_editor')->nullable();
            $table->string('university_slug')->nullable();
            $table->integer('university_status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('universities');
    }
};
