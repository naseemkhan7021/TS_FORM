<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormdata15sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('formdata_15s')) {
            Schema::create('formdata_15s', function (Blueprint $table) {
                $table->id('formdata_15s_id');
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


                // ******* all Remaining data
                $table->string('potential_injurytos_other')->nullable();
                $table->string('report_no')->nullable();
                $table->mediumText('nature_of_potential_injuries_ids')->nullable();
                $table->string('nature_of_potential_injuries_other')->nullable();
                $table->mediumText('activity15s_ids')->nullable();
                $table->string('details_of_nearmiss')->nullable();
                $table->mediumText('imdcause15s_ids')->nullable();
                $table->string('imdcause15s_other')->nullable();
                $table->mediumText('contributing_causes_ids')->nullable();
                $table->string('contributing_causes_other')->nullable();
                $table->mediumText('whyunsafeact_committeds_ids')->nullable();
                $table->string('whyunsafeact_committeds_other')->nullable();
                $table->mediumText('imd_actions_ids')->nullable();
                $table->mediumText('imd_corrections_ids')->nullable();
                $table->string('further_recommended_action')->nullable();
                $table->string('completed_by_name')->nullable();
                $table->boolean('completed_by_signature')->default(1);
                $table->date('completed_date')->nullable();
                $table->dateTime('doincident_dt')->nullable();


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
        Schema::dropIfExists('formdata_15s');
    }
}
