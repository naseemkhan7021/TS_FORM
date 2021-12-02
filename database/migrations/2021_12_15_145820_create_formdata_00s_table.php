<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormdata00sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formdata_00s', function (Blueprint $table) {
            $table->id('formdata_00s_id');
            // companies
            $table->unsignedBigInteger('ibc_id_fk')->default(1);
            $table->foreign('ibc_id_fk')->references('ibc_id')->on('companies')->onDelete('cascade');
            // department
            $table->unsignedBigInteger('idepartment_id_fk')->default(1);
            $table->foreign('idepartment_id_fk')->references('idepartment_id')->on('departments')->onDelete('cascade');
            // project
            $table->unsignedBigInteger('iproject_id_fk')->default(1);
            $table->foreign('iproject_id_fk')->references('iproject_id')->on('projects')->onDelete('cascade');
            // document
            $table->unsignedBigInteger('document_id_fk')->default(1);
            $table->foreign('document_id_fk')->references('document_id')->on('documents')->onDelete('cascade');

            $table->tinyInteger('sr_no');
            $table->string('document_name',150);
            $table->string('document_code',20);


            // general values
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
        Schema::dropIfExists('formdata_00s');
    }
}
