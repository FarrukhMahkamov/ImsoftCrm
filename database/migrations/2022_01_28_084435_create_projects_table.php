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
            $table->text('general_file');
            $table->foreignId('status_id');
            $table->foreignId('developer_id');
            $table->text('developer_info');
            $table->dateTime('start_date');
            $table->dateTime('deadline_date');
            $table->dateTime('finish_date');
            $table->text('about_file');
            $table->text('project_file');
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
