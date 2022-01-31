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
            $table->string('enterprise_name');
            $table->foreignId('category_id');
            $table->foreignId('activity_type_id');
            $table->foreignId('state_id');
            $table->foreignId('region_id');
            $table->string('address_id');
            $table->string('home_address');
            $table->string('client_name');
            $table->bigInteger('client_phone_number');
            $table->bigInteger('client_phone_number_2');
            $table->dateTime('client_born_date');
            $table->foreignId('operator_id');
            $table->bigInteger('operator_phone_number');
            $table->bigInteger('operator_phone_number_2');
            $table->dateTime('operator_born_date');
            $table->bigInteger('latitude');
            $table->bigInteger('longtitude');
            $table->text('file');
            $table->foreignId('developer_id');
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
