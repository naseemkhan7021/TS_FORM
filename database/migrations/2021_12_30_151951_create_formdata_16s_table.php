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
        if (!Schema::hasTable('formdata_16s')) {
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
                $table->unsignedBigInteger('ddd_id_fk')->default(1);
                $table->foreign('ddd_id_fk')->references('ddd_id')->on('dept_default_docs')->onDelete('cascade');

                // Injury To  Join
                $table->unsignedBigInteger('potential_injurytos_fk')->default(1);
                $table->foreign('potential_injurytos_fk')->references('potential_injurytos_id')->on('potential_injurytos')->onDelete('cascade');
                // upload document join
                // $table->unsignedBigInteger('uploaddocuments_fk')->default(1);
                // $table->foreign('uploaddocuments_fk')->references('uploaddocuments_id')->on('uploaddocuments')->onDelete('cascade');
                // Gender Table Ref
                $table->unsignedBigInteger('gender_fk')->default(1);
                $table->foreign('gender_fk')->references('gender_id')->on('genders')->onDelete('cascade');


                // ******* all Remaining data
                $table->string('injuredvictim_name', 100)->nullable();
                $table->string('potential_injurytos_other', 100)->nullable();
                $table->string('eml_id_no', 100)->nullable();
                $table->string('designation', 100)->nullable();
                $table->date('dob_dt')->nullable();
                $table->integer('age')->nullable();
                $table->date('doj_dt')->nullable();
                $table->boolean('safety_inducted')->default(true);
                $table->boolean('married')->default(true);
                $table->string('present_address', 151)->nullable();
                $table->string('permanent_address', 151)->nullable();
                $table->boolean('person_on_duty')->default(true);
                $table->boolean('person_authorized_2_incident_area')->default(true);
                $table->string('first_incident_reported_to', 100)->nullable();
                $table->string('by_whom', 100)->nullable();
                $table->date('date_time_reported_dt')->nullable();; // auto data->nullable() 
                $table->string('witness1_name')->nullable();
                $table->string('witness2_name')->nullable();
                $table->string('designation_1')->nullable();
                $table->string('designation_2')->nullable();
                $table->boolean('first_aid_given_on_site')->default(1);
                $table->string('name_first_aider', 100)->nullable();
                $table->boolean('victim_taken_hospital')->default(1);
                $table->string('name_hospital', 100)->nullable();
                $table->boolean('victim_hospital_dischaged')->default(1);
                $table->date('return_to_work')->nullable();
                $table->boolean('victim_influence_alcohol')->default(1);
                $table->string('description_of_incident', 500)->nullable();
                $table->string('extend_injury', 100)->nullable();
                $table->string('activity16', 100)->nullable();
                $table->string('relavebt_risk_referenceno', 100)->nullable();
                $table->string('control_measure', 100)->nullable();
                $table->string('actions_taken', 100)->nullable();
                $table->string('site_enginner_name', 100)->nullable();
                $table->string('site_enginner_signature', 100)->nullable();
                $table->string('project_manager', 100)->nullable();
                $table->string('project_manager_signature', 100)->nullable();
                $table->dateTime('doincident_dt')->nullable();
                

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
        Schema::dropIfExists('formdata_16s');
    }
}
