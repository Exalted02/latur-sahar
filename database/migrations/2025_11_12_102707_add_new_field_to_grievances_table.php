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
        Schema::table('grievances', function (Blueprint $table) {
            $table->timestamp('resubmitted_date')->nullable()->after('submitted_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('grievances', function (Blueprint $table) {
            //
        });
    }
};
