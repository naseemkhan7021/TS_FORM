<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDestributionToForm16sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('destribution_to_form16s')) {
        Schema::create('destribution_to_form16s', function (Blueprint $table) {
            $table->id('destribution_to_form16s_id');

            $table->string('destribution_designation');
            $table->string('destribution_name');
            $table->boolean('destribution_signature')->default('0');
            $table->string('destribution_acknowlage_dt');
            $table->string('destribution_remark');
            
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
        Schema::dropIfExists('destribution_to_form16s');
    }
}
