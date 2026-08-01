<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
{
    Schema::table('health_infos', function (Blueprint $table) {
        $table->unsignedBigInteger('student_id')->after('id');
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('health_infos', function (Blueprint $table) {
        $table->dropColumn('student_id');
    });
}
};
