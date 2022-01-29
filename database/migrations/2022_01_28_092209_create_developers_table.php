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
            $table->dateTime('start_work');
            $table->string('surname');
            $table->string('phone_number');
            $table->string('work_type')->default('Backend Developer');
            $table->longText('about');
            $table->text('file');
            $table->string('workstatus')->default('offline');
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
