<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('project_name');
            $table->text('general_info');
            $table->text('tech_doc');
            $table->text('dev_doc');
            $table->text('file_doc');
            $table->integer('status_id');
            $table->foreignId('developer_id');
            $table->foreignId('client_id');
            $table->dateTime('start_date');
            // $table->dateTime('deadline_date');
            $table->dateTime('finish_date');
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
        Schema::dropIfExists('projects');
    }
}
