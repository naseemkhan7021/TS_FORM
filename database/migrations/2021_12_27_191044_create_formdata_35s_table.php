<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormdata35sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('formdata_35s')) {
            Schema::create('formdata_35s', function (Blueprint $table) {
                $table->id('formdata_35s_id');
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

                $table->string('parmitNo')->nullable(true);
                $table->date('working_dt')->nullable(true);
                $table->time('working_t_F')->nullable(true);
                $table->time('working_t_T')->nullable(true);
                // $table->string('exact_location_nature_of_work')->nullable(true);
                $table->string('contractor_name')->nullable(true);
                $table->string('supervisor_name')->nullable(true);
                $table->string('no_of_people_working')->nullable(true);
                $table->mediumText('form35_checkpoint_ids')->nullable(true);
                $table->mediumText('activity_ids')->nullable(true);
                $table->mediumText('form35_checkpoint_remark')->nullable(true);
                $table->mediumText('exact_location_nature_of_work_ids')->nullable(true);
                $table->string('name_of_permit_issuing_authority')->nullable(true);
                $table->boolean('sing_of_permit_issuing_authority')->default(0);

                $table->string('name_permit_receiver')->nullable(true);
                $table->boolean('sing_permit_receiver')->default(0);

                $table->string('name_safety_representative')->nullable(true);
                $table->boolean('sing_safety_representative')->default(0); // 0 for not-signed and 1 for signed

                $table->string('name_of_permit_issuing_receiver_if_complete')->nullable(true);
                $table->boolean('sing_of_permit_issuing_receiver_if_complete')->default(0);
                $table->date('permit_issuing_receiver_if_complete_sing_dt')->nullable(true);

                $table->string('name_of_permit_issuing_authority_if_complete')->nullable(true);
                $table->boolean('sing_of_permit_issuing_authority_if_complete')->default(0);
                $table->date('permit_issuing_authority_if_complete_sing_dt')->nullable(true);

                $table->string('name_of_site_safety_officer')->nullable(true);
                $table->boolean('sing_of_site_safety_officer')->nullable(true);
                
                $table->boolean('permit_close_or_continued')->default(0); // 0 for close and 1 for contiued
                $table->boolean('tags_removed')->default(0);

                
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
        Schema::dropIfExists('formdata_35s');
    }
}
