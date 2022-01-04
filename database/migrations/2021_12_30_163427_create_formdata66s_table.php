<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormdata66sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('formdata66s')) {
            # code...
            Schema::create('formdata66s', function (Blueprint $table) {
                $table->id('formdata66_id');

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

                // sub_activity66s
                $table->unsignedBigInteger('B_activity_id_fk');
                $table->foreign('B_activity_id_fk')->references('activity_id')->on('activity66s')->onDelete('cascade');
                // sub_activity66s
                $table->unsignedBigInteger('C_sub_activity_id_fk');
                $table->foreign('C_sub_activity_id_fk')->references('sub_activity_id')->on('sub_activity66s')->onDelete('cascade');
                // environmental_impacts
                $table->unsignedBigInteger('E_environmental_impact_id_fk');
                $table->foreign('E_environmental_impact_id_fk')->references('environmental_impact_id')->on('environmental_impacts')->onDelete('cascade');
                // H_organization_requirement_id_fk
                $table->unsignedBigInteger('H_organization_requirement_id_fk');
                $table->foreign('H_organization_requirement_id_fk')->references('organization_requirement_id')->on('organization_requirements')->onDelete('cascade');
                // I_scale_of_impact_id_fk
                $table->unsignedBigInteger('I_scale_of_impact_id_fk');
                $table->foreign('I_scale_of_impact_id_fk')->references('scale_of_impact_id')->on('scale_of_impacts')->onDelete('cascade');
                // J_severty_of_impact_id_fk
                $table->unsignedBigInteger('J_severty_of_impact_id_fk');
                $table->foreign('J_severty_of_impact_id_fk')->references('severty_of_impact_id')->on('severty_of_impacts')->onDelete('cascade');
                // K_duration_of_impact_id_fk
                $table->unsignedBigInteger('K_duration_of_impact_id_fk');
                $table->foreign('K_duration_of_impact_id_fk')->references('duration_of_impact_id')->on('duration_of_impacts')->onDelete('cascade');
                // M_probability_id_fk
                $table->unsignedBigInteger('M_probability_id_fk');
                $table->foreign('M_probability_id_fk')->references('probability_id')->on('probabilities')->onDelete('cascade');
                
                // ganeral
                $table->mediumText('C_sub_activity_id_fks')->nullable(true);
                $table->enum('F_condition_of_impact', array('A', 'N','E'))->default('A');
                $table->enum('O_significance_score_level', array('Nonsignificant', 'Significant'))->default('Nonsignificant');
                $table->string('D_environmental_aspect',191)->nullable(true);
                $table->string('G_existing_controls_as_per_hierarchy')->nullable(true);
                $table->integer('L_consequence')->nullable(true);
                $table->integer('P1_cut_off_value')->nullable(true);
                $table->integer('N_impact_score')->nullable(true);
                $table->string('P_additional_control')->nullable(true);
                $table->integer('Q_risk_rating_priority')->nullable(true);
                
                // comman 
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
        Schema::dropIfExists('formdata66s');
    }
}
