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
        Schema::create('jobcard', function (Blueprint $table) {
            $table->id();
            $table->string('no_jobcard')->unique();
            $table->date('date');
            $table->integer('kurs');
            $table->string('customer_name');
            $table->string('no_po')->unique();
            $table->date('po_date');
            $table->date('po_received');
            $table->integer('totalbop');
            $table->integer('totalsp');
            $table->integer('totalbp');
            $table->string('no_form');
            $table->date('effective_date');
            $table->integer('no_revisi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobcard');
    }
};
