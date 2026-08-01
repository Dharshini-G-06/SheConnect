<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('health_infos', function (Blueprint $table) {

        $table->string('medical_center')
              ->nullable();

        $table->string('doctor_name')
              ->nullable();

        $table->string('contact_number')
              ->nullable();

    });
}



public function down()
{
    Schema::table('health_infos', function (Blueprint $table) {

        $table->dropColumn([
            'medical_center',
            'doctor_name',
            'contact_number'
        ]);

    });
}
};
