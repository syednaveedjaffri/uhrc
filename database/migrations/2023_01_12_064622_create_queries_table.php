<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('queries', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->foreignId('campus_id')->constrained()->cascadeOnDelete();
            $table->foreignId('faculty_id')->constrained()->cascadeOnDelete();
            $table->foreignId('department_id')->constrained()->cascadeOnDelete();
            // $table->foreignId('employee_id')->constrained()->cascadeOnDelete();
            // $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('complain_id')->constrained()->cascadeOnDelete();
            // $table->foreignId('vendor_id')->constrained()->cascadeOnDelete();
            // $table->boolean('pending')->default('1')->comment('0 means pending, 1 means done');
            $table->string('pending')->default('0')->comment('0 means pending, 1 means Resolved');
            $table->string('status')->default('lab')->comment('0 in Lab, 1 goes to vendor');
            // $table->string('status')->default('lab')->comment('0 in Lab, 1 goes to vendor');
            // $table->string('description')->nullable();
            // $table->timestamp('deleivered')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('queries');
    }
};
