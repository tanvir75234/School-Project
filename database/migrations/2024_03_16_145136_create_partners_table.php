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
        Schema::create('partners', function (Blueprint $table) {
            $table->bigIncrements('partner_id');
            $table->string('partner_title')->nullable();
            $table->string('partner_url')->nullable();
            $table->string('partner_logo')->nullable();
            $table->string('partner_slug')->nullable();
            $table->integer('partner_creator')->nullable();
            $table->integer('partner_status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partners');
    }
};
