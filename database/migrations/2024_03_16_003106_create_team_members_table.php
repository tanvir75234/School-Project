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
        Schema::create('team_members', function (Blueprint $table) {
            $table->bigIncrements('team_member_id');
            $table->string('member_name')->nullable();
            $table->string('member_designation')->nullable();
            $table->string('member_facebook')->nullable();
            $table->string('member_twitter')->nullable();
            $table->string('member_whatsapp')->nullable();
            $table->string('member_instagram')->nullable();
            $table->string('member_photo')->nullable();
            $table->string('member_order')->nullable();
            $table->integer('member_creator')->nullable();
            $table->integer('member_editor')->nullable();
            $table->string('member_slug')->nullable();
            $table->integer('member_status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team_members');
    }
};
