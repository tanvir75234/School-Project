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
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('project_id');
            $table->integer('procate_id')->nullable();
            $table->string('project_title')->nullable();
            $table->string('project_url')->nullable();
            $table->string('project_remarks')->nullable();
            $table->string('project_image')->nullable();
            $table->integer('project_order')->nullable();
            $table->string('project_slug')->nullable();
            $table->integer('project_feature')->default(0);
            $table->integer('project_publish')->default(1);
            $table->integer('project_creator')->nullable();
            $table->integer('project_editor')->nullable();
            $table->integer('project_status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
