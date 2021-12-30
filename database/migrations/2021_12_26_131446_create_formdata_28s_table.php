<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormdata28sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('formdata_28s')) {
            Schema::create('formdata_28s', function (Blueprint $table) {
                $table->id('formdata_28s_id');

                // companies
                $table->unsignedBigInteger('ibc_id_fk')->default(1);
                $table->foreign('ibc_id_fk')->references('ibc_id')->on('companies')->onDelete('cascade');
                // department
                $table->unsignedBigInteger('idepartment_id_fk')->default(1);
                $table->foreign('idepartment_id_fk')->references('idepartment_id')->on('departments')->onDelete('cascade');
                // project
                $table->unsignedBigInteger('iproject_id_fk')->default(1);
                $table->foreign('iproject_id_fk')->references('iproject_id')->on('projects')->onDelete('cascade');
                // document -------- --- --
                $table->unsignedBigInteger('document_id_fk')->default(1);
                $table->foreign('document_id_fk')->references('document_id')->on('documents')->onDelete('cascade');
                // form16 data


                $table->string('observation_desc', 50)->nullable();
                $table->string('location', 50)->nullable();
                $table->string('noticed_time', 50)->nullable();
                $table->string('recommend_corrective_action', 50)->nullable();

                $table->unsignedBigInteger('prioritytimescales_id_fk')->default(1);
                $table->foreign('prioritytimescales_id_fk')->references('prioritytimescales_id')->on('prioritytimescales')->onDelete('cascade');

                $table->string('responsible_person', 50)->nullable();
                $table->string('sign_resp_person', 50)->nullable();
                $table->string('closed_dt', 50)->nullable();
                $table->string('remarks', 50)->nullable();

                $table->boolean('bactive')->default(true);
                $table->integer('user_created')->default(0);
                $table->integer('user_updated')->default(0);
                $table->timestamp('created_at')->useCurrent();
                $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formdata_28s');
    }
}
