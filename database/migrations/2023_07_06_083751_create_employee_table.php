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
        Schema::create('tbl_employee', function (Blueprint $table) {
            $table->id();
            $table->string('e_name');
            $table->string('e_address');
            $table->date('e_dob');
            $table->date('e_joined_date');
            $table->string('e_phone_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_employee');
    }
};
