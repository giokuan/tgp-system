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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('member_id', 20)->unique();
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name');
            $table->date('t_birth');
            $table->string('email');
            $table->string('phone');
            $table->string('aka');
            $table->string('gt');
            $table->string('batch_name');
            $table->string('current_chapter');
            $table->string('root_chapter');
            $table->string('status');
            $table->string('user_type');
            $table->string('region');
            $table->string('province');
            $table->string('municipality');
            $table->string('barangay');
            $table->text('address');
            $table->string('photo', 2048)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
