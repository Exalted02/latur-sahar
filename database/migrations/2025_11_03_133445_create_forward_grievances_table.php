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
        Schema::create('forward_grievances', function (Blueprint $table) {
            $table->id();
			$table->integer('greivance_id')->nullable();
			$table->integer('forwarded_by')->nullable();
			$table->integer('forwarded_to')->nullable();
			$table->text('forward_text')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forward_grievances');
    }
};
