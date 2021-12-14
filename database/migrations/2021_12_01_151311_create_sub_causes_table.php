<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubCausesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('sub_causes')) {
        Schema::create('sub_causes', function (Blueprint $table) {
            $table->id('sub_causes_id');

            $table->unsignedBigInteger('sub_causes_fk');
            $table->foreign('sub_causes_fk')->references('causes_id')->on('causes')->onDelete('cascade');

            $table->string('sub_causes_description', 150);
            $table->string('sub_causes_abbr',20);

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
        Schema::dropIfExists('sub_causes');
    }
}
