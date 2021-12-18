<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormdata22ParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('formdata_22_participants')) {
            Schema::create('formdata_22_participants', function (Blueprint $table) {
                $table->id('formdata_22_participants_id');

                $table->unsignedBigInteger('formdata_22s_id_fk')->default(1);
                $table->foreign('formdata_22s_id_fk')->references('formdata_22s_id')->on('formdata_22_headers')->onDelete('cascade');

                $table->integer('id_no')->default(0);
                $table->string('participant_name', 100);
                $table->integer('age')->default(0);
                $table->string('desgination')->nullable();
                $table->boolean('signature')->default(0);

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
        Schema::dropIfExists('formdata_22_participants');
    }
}
