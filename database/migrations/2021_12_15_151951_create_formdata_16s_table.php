<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormdata16sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formdata_16s', function (Blueprint $table) {
            $table->id('formdata_16s_id');
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

            // Injury To  Join
            $table->unsignedBigInteger('potential_injurytos_fk')->default(1);
            $table->foreign('potential_injurytos_fk')->references('potential_injurytos_id')->on('potential_injurytos')->onDelete('cascade');
            // upload document join
            $table->unsignedBigInteger('uploaddocuments_fk')->default(1);
            $table->foreign('uploaddocuments_fk')->references('uploaddocuments_id')->on('uploaddocuments')->onDelete('cascade');
            // Gender Table Ref
            $table->unsignedBigInteger('gender_fk')->default(1);
            $table->foreign('gender_fk')->references('gender_id')->on('genders')->onDelete('cascade');


            // ******* all Remaining data
            $table->string('injuredvictim_name', 100);
            $table->string('eml_id_no', 100);
            $table->string('designation', 100);
            $table->date('dob_dt');
            $table->integer('age');
            $table->date('doj_dt');
            $table->boolean('safety_inducted');
            $table->boolean('married');
            $table->string('present_address',151);
            $table->string('permanent_address',151);
            $table->boolean('person_on_duty');
            $table->boolean('person_authorized_2_incident_area');
            $table->string('first_incident_reported_to',100);
            $table->string('by_whom',100);
            $table->date('date_time_reported_dt'); // auto data 
            $table->string('witness1_name');
            $table->string('witness2_name');
            $table->string('designation_1');
            $table->string('designation_2');
            $table->boolean('first_aid_given_on_site');
            $table->string('name_first_aider',100);
            $table->boolean('victim_taken_hospital');
            $table->string('name_hospital',100);
            $table->boolean('victim_hospital_dischaged');
            $table->date('return_to_work');
            $table->boolean('victim_influence_alcohol');
            $table->string('description_of_incident',500);
            $table->string('extend_injury',100);
            $table->string('activity16',100);
            $table->string('relavebt_risk_referenceno',100);
            $table->string('control_measure',100);
            $table->string('actions_taken',100);
            $table->string('site_enginner_name',100);
            $table->string('site_enginner_signature',100);
            $table->string('project_manager',100);
            $table->string('project_manager_signature',100);

            
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
        Schema::dropIfExists('formdata_16s');
    }
}
