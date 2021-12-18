<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormdata22HeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('formdata_22_headers')) {
            Schema::create('formdata_22_headers', function (Blueprint $table) {
                $table->id('formdata_22s_id');

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


                $table->timestamp('ehsind_dt')->useCurrent();
                $table->string('contractor_name', 100)->nullable();
                $table->string('venue', 100)->nullable();
                $table->string('faculty_name', 100)->nullable();
                $table->string('duration', 20)->nullable();

                $table->string('faculty_sign', 100)->nullable();
                $table->string('site_safety_in_charge_name', 100)->nullable();
                $table->string('site_safety_in_charge_sign', 100)->nullable();
                $table->string('topic_discusseds_ids', 100)->nullable();

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
        Schema::dropIfExists('formdata_22_headers');
    }
}
