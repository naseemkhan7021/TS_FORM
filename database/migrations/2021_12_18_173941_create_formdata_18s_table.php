<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormdata18sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('formdata_18s')) {
            Schema::create('formdata_18s', function (Blueprint $table) {
                $table->id('formdata_18s_id');
                $table->unsignedBigInteger('iproject_id_fk')->default(1);
                $table->foreign('iproject_id_fk')->references('iproject_id')->on('projects')->onDelete('cascade');
                $table->string('extinguisher_no',191)->nullable(true);
                $table->string('location',191)->nullable(true);
                $table->string('type',191)->nullable(true);
                $table->string('size',191)->nullable(true);
                $table->date('date_of_refilling')->nullable(true);
                $table->date('date_of_inspection')->nullable(true);
                $table->enum('pressure_gauge_or_safety_pin_status',['Good','Bad'])->default('Good');
                $table->enum('seal_intact_and_not_corroded',['Yes','No'])->default('Yes');
                $table->string('name_of_responsible_person',200)->nullable(true);
                $table->date('due_for_next_refilling')->nullable(true);
                $table->date('due_for_next_inspection')->nullable(true);
                $table->string('inspected_by_name',200)->nullable(true);
                $table->string('inspected_by_designation',300)->nullable(true);
                $table->boolean('inspected_by_signature')->default(false);
                $table->date('inspected_by_date')->nullable(true);
                

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
        Schema::dropIfExists('formdata_18s');
    }
}
