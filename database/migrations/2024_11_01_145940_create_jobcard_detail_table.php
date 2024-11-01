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
        Schema::create('jobcard_detail', function (Blueprint $table) {
            $table->id();
            $table->integer('qty');
            $table->string('description');
            $table->integer('unit_bop');
            $table->integer('total_bop');
            $table->integer('unit_sp');
            $table->integer('total_sp');
            $table->integer('unit_bp');
            $table->integer('total_bp');
            $table->string('supplier');
            $table->string('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobcard_detail');
    }
};
