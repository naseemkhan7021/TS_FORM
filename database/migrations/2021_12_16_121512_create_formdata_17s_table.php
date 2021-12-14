<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormdata17sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('formdata_17s')) {
            Schema::create('formdata_17s', function (Blueprint $table) {
                $table->id('formdata_17s_id');

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
                $table->unsignedBigInteger('formdata_16s_id_fk')->default(1);
                $table->foreign('formdata_16s_id_fk')->references('formdata_16s_id')->on('formdata_16s')->onDelete('cascade');
                // SUBSTANDARD ACTIONS
                $table->unsignedBigInteger('substandaction_id_fk')->default(1);
                $table->foreign('substandaction_id_fk')->references('substandaction_id')->on('substandactions')->onDelete('cascade');
                // SUBSTANDARD CONDITIONS
                $table->unsignedBigInteger('substandcondition_id_fk')->default(1);
                $table->foreign('substandcondition_id_fk')->references('substandcondition_id')->on('substandconditions')->onDelete('cascade');

                $table->text('incident_description')->nullable();
                $table->text('coworker_statement')->nullable();
                // $table->text('incident_description')->nullable();
                $table->text('concernedsupervisor_statement')->nullable();
                $table->text('root_cause')->nullable();
                $table->text('remedial_actions')->nullable();
                $table->text('comment_remedial_actions')->nullable();


                $table->string('site_safety_in_charge_name', 100)->nullable();
                $table->string('site_safety_in_charge_signature', 100)->nullable();
                $table->string('project_manager', 100)->nullable();
                $table->string('project_manager_signature', 100)->nullable();

                // general values
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
        Schema::dropIfExists('formdata_17s');
    }
}
