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
        Schema::create('countries', function (Blueprint $table) {
            $table->bigIncrements('country_id');
            $table->string('country_name')->nullable();
            $table->string('country_title')->nullable();
            $table->text('country_subtitle')->nullable();
            $table->longtext('country_details')->nullable();
            $table->string('country_url')->nullable();
            $table->string('country_phone')->nullable();
            $table->string('country_order')->nullable();
            $table->string('country_image')->nullable();
            $table->string('country_slug')->nullable();
            $table->integer('country_status')->default(1);
            $table->integer('country_creator')->nullable();
            $table->integer('country_editor')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
