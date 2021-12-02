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
            $table->id('iproject_id');

            $table->unsignedBigInteger('ibc_id_fk')->default(1);
            $table->foreign('ibc_id_fk')->references('ibc_id')->on('companies')->onDelete('cascade');
            $table->unsignedBigInteger('idepartment_id_fk')->default(1);
            $table->foreign('idepartment_id_fk')->references('idepartment_id')->on('departments')->onDelete('cascade');

            $table->string('sproject_name',150);
            $table->string('sproject_abbr',50);
            $table->string('sproject_location',150);

            $table->boolean('bactive')->default(true);
            $table->integer('user_created')->default(0);
            $table->integer('user_updated')->default(0);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
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
