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
        Schema::create('grievances', function (Blueprint $table) {
            $table->id();
			$table->string('name')->nullable();
			$table->string('mobile_no')->nullable();
			$table->string('ward_prabhag')->nullable();
			$table->integer('department')->nullable();
			$table->integer('grievance_type')->nullable();
			$table->text('address')->nullable();
			$table->string('pincode')->nullable();
			$table->text('issue_description')->nullable();
			$table->string('gps_location')->nullable();
			$table->integer('feedback_rating')->nullable();
			$table->text('feedback_description')->nullable();
			$table->timestamp('submitted_date')->nullable();
			$table->timestamp('solve_date')->nullable();
			$table->tinyInteger('status')->default(1)->comment('1=pending, 2=resubmit, 3=solved');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grievances');
    }
};
