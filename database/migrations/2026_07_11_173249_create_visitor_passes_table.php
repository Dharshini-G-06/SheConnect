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
        Schema::create('visitor_passes', function (Blueprint $table) {
    $table->id();

    $table->foreignId('student_id')->constrained()->onDelete('cascade');

    $table->string('visitor_name');

    $table->string('relationship');

    $table->string('mobile');

    $table->date('visit_date');

    $table->time('in_time');

    $table->time('out_time');

    $table->text('reason');

    $table->enum('status',['Pending','Approved','Rejected'])
          ->default('Pending');

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitor_passes');
    }
};
