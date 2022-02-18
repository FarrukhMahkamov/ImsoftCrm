<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->text('general_info');
            $table->text('general_document');
            $table->string('enterprise_name');
            $table->foreignId('category_id');
            $table->foreignId('activity_type_id');
            $table->foreignId('state_id');
            $table->foreignId('region_id');
            $table->string('address_id');
            $table->string('home_address');
            $table->text('order_reason');
            $table->string('client_name');
            $table->string('client_phone_number');
            $table->string('client_phone_number_2');
            $table->dateTime('client_born_date');
            $table->string('operator_name');
            $table->string('operator_phone_number');
            $table->string('operator_phone_number_2');
            $table->dateTime('operator_born_date');
            $table->string('latitude');
            $table->string('longtitude');
            $table->integer('client_status');
            $table->text('file');
            $table->foreignId('type_id');
            $table->dateTime('order_time');
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
        Schema::dropIfExists('clients');
    }
}
