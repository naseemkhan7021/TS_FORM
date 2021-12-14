<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormdata01sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('formdata_01s')) {
            Schema::create('formdata_01s', function (Blueprint $table) {
                $table->id('formdata_01s_id');
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

                // activities
                $table->unsignedBigInteger('B_activity_id_fk');
                $table->foreign('B_activity_id_fk')->references('activity_id')->on('activities')->onDelete('cascade');
                // sub_activities
                $table->unsignedBigInteger('C_sub_activity_id_fk');
                $table->foreign('C_sub_activity_id_fk')->references('sub_activity_id')->on('sub_activities')->onDelete('cascade');
                // Routine & Non Routine
                $table->enum('D_routine', array('R', 'N'))->default('R');


                // potential_hazards
                $table->unsignedBigInteger('E_potential_hazard_id_fk')->default(1);
                $table->foreign('E_potential_hazard_id_fk')->references('potential_hazard_id')->on('potential_hazards')->onDelete('cascade');
                // probable_consequences
                $table->unsignedBigInteger('F_probable_consequence_id_fk')->default(1);
                $table->foreign('F_probable_consequence_id_fk')->references('probable_consequence_id')->on('probable_consequences')->onDelete('cascade');
                // causes
                $table->unsignedBigInteger('G_causes_id_fk')->default(1);
                $table->foreign('G_causes_id_fk')->references('causes_id')->on('causes')->onDelete('cascade');
                // sub_causes
                $table->unsignedBigInteger('G1_sub_causes_id_fk')->default(1);
                $table->foreign('G1_sub_causes_id_fk')->references('sub_causes_id')->on('sub_causes')->onDelete('cascade');
                // preventive_incident_controle
                $table->unsignedBigInteger('H_preventive_incident_control_id_fk')->default(1);
                $table->foreign('H_preventive_incident_control_id_fk')->references('preventive_incident_control_id')->on('preventive_incident_controls')->onDelete('cascade');
                // consequences_controle
                $table->unsignedBigInteger('I_consequences_controls_id_fk')->default(1);
                $table->foreign('I_consequences_controls_id_fk')->references('consequences_controls_id')->on('consequences_controls')->onDelete('cascade');

                // Risk Probability
                $table->unsignedBigInteger('J_risk_probability_id_fk')->default(1);
                $table->foreign('J_risk_probability_id_fk')->references('risk_probability_id')->on('risk_probabilities')->onDelete('cascade');
                // Risk Consequence
                $table->unsignedBigInteger('K_risk_consequence_id_fk')->default(1);
                $table->foreign('K_risk_consequence_id_fk')->references('risk_consequence_id')->on('risk_consequences')->onDelete('cascade');
                // Duration of Exposure
                $table->unsignedBigInteger('L_duration_of_exposure_id_fk')->default(1);
                $table->foreign('L_duration_of_exposure_id_fk')->references('duration_of_exposure_id')->on('duration_of_exposures')->onDelete('cascade');


                // engineering_controls
                $table->unsignedBigInteger('engineering_control_id_fk')->default(1);
                $table->foreign('engineering_control_id_fk')->references('engineering_control_id')->on('engineering_controls')->onDelete('cascade');
                // administrative_control_preventives
                $table->unsignedBigInteger('administrative_control_preventive_id_fk')->default(1);
                $table->foreign('administrative_control_preventive_id_fk')->references('administrative_control_preventive_id')->on('administrative_control_preventives')->onDelete('cascade');
                // administrative_control_mitigatives
                $table->unsignedBigInteger('administrative_control_mitigative_id_fk')->default(1);
                $table->foreign('administrative_control_mitigative_id_fk')->references('administrative_control_mitigative_id')->on('administrative_control_mitigatives')->onDelete('cascade');


                // ******* all Remaining data
                // Any Legal Obligation to the risk Assessment
                $table->enum('M_any_legal_obligation_to_the_risk_assessment', array('YES', 'NO'))->default('NO');
                // Risk Quantum
                $table->integer('N_risk_quantum');
                // Risk Acceptable / Non Acceptable
                $table->enum('O_risk_acceptable_non_acceptable', array('Acceptable', 'non_Acceptable'));
                // For Non acceptable risk, No. of person believed to be affected
                $table->integer('P_no_of_person_believed_to_be_affected');
                // Actions as per hierarchy of control (Refer Guideword)
                $table->string('Q_actions_as_per_hierarchy_of_control', 50);
                // Risk Probability
                $table->integer('R_risk_probability');
                // Risk Consequence
                $table->integer('S_risk_consequence');
                // Duration
                $table->integer('T_duration');
                // Risk Quantum
                $table->integer('U_risk_quantum');
                // Risk Acceptable / Non Acceptable
                $table->enum('V_risk_acceptable_non_acceptable', array('Acceptable', 'Non_Acceptable'))->default('Acceptable');



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
        Schema::dropIfExists('formdata_01s');
    }
}
