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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('univ_id')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name')->nullable();
            $table->string('suffix_name')->nullable();
            $table->string('emp_name');
            $table->string('emp_class')->nullable();
            $table->unsignedBigInteger('dept_id')->nullable();
            $table->unsignedBigInteger('appointment_id')->nullable();
            $table->string('designation_desc')->nullable();
            $table->timestampsTz();

            $table->foreign('dept_id')
                ->references('id')
                ->on('departments')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('appointment_id')
                ->references('id')
                ->on('appointments')
                ->onDelete('restrict')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
