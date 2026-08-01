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
    Schema::create('health_infos', function (Blueprint $table) {

        $table->id();

        $table->date('last_period')->nullable();

        $table->integer('cycle_length')->default(28);

        $table->integer('water_intake')->nullable();

        $table->integer('sleep_hours')->nullable();

        $table->float('height')->nullable();

        $table->float('weight')->nullable();

        $table->text('health_tip')->nullable();

        $table->timestamps();

    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('health_infos');
    }
};
