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
        Schema::create('testimonials', function (Blueprint $table) {
            $table->bigIncrements('testi_id');
            $table->string('testi_name')->nullable();
            $table->string('testi_designation')->nullable();
            $table->string('testi_company')->nullable();
            $table->string('testi_star')->nullable();
            $table->text('testi_feedback')->nullable();
            $table->string('testi_photo')->nullable();
            $table->string('testi_order')->nullable();
            $table->string('testi_slug')->nullable();
            $table->integer('testi_status')->default(1);
            $table->integer('testi_publish')->default(1);
            $table->integer('testi_creator');
            $table->integer('testi_editor')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
