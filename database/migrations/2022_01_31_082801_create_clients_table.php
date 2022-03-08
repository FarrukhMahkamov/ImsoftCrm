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
            $table->text('general_info')->nullable();
            $table->text('general_document')->nullable();
            $table->string('enterprise_name');
            $table->foreignId('category_id');
            $table->foreignId('activity_type_id');
            $table->foreignId('state_id');
            $table->foreignId('region_id');
            $table->string('address_id');
            $table->string('home_address');

            $table->integer('order_reason_id')->nullable();
            $table->string('order_reason')->nullable();
          
            $table->string('client_name');
            $table->string('client_phone_number');
            $table->string('client_phone_number_2')->nullable();
            $table->string('client_born_date');
            $table->string('operator_name');
            $table->string('operator_phone_number');
            $table->string('operator_phone_number_2')->nullable();
            $table->string('operator_born_date');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->integer('client_status');
            $table->text('file_1');
            $table->text('file_2');
            $table->text('file_3');
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
