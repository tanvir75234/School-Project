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
        Schema::create('contact_messages', function (Blueprint $table) {
            $table->bigIncrements('cm_id');
            $table->string('cm_name')->nullable();
            $table->string('cm_phone')->nullable();
            $table->string('cm_email')->nullable();
            $table->string('cm_slug')->nullable();
            $table->text('cm_message')->nullable();
            $table->text('cm_subject')->nullable();
            $table->integer('cm_status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_messages');
    }
};
