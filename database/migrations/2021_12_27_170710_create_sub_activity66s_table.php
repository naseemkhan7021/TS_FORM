<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubActivity66sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('sub_activity66s')) {
            Schema::create('sub_activity66s', function (Blueprint $table) {
                $table->id('sub_activity_id');
                $table->unsignedBigInteger('activity_id_fk')->default(1);
                $table->foreign('activity_id_fk')->references('activity_id')->on('activity66s')->onDelete('cascade');
                $table->string('sub_activity_description', 150);
                $table->string('sub_activity_abbr', 20);

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
        Schema::dropIfExists('sub_activity66s');
    }
}
