<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevelopersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('developers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('born_date');
            $table->string('phone_number');
            $table->foreignId('type_id');
            $table->foreignId('state_id');
            $table->foreignId('region_id');
            $table->string('address');
            $table->string('longitude');
            $table->string('latitude');
            $table->longText('about');     
            $table->text('passport');
            $table->text('family');
            $table->text('developer_photo');
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
        Schema::dropIfExists('developers');
    }
}
