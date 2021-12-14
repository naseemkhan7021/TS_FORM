<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDefaultdatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('defaultdatas')) {
        Schema::create('defaultdatas', function (Blueprint $table) {
            $table->id('idefault_id');
            $table->string('description',150)->nullable();

            $table->unsignedBigInteger('ibc_id_fk')->default(1);
            $table->foreign('ibc_id_fk')->references('ibc_id')->on('companies')->onDelete('cascade');

            $table->unsignedBigInteger('idepartment_id_fk')->default(1);
            $table->foreign('idepartment_id_fk')->references('idepartment_id')->on('departments')->onDelete('cascade');

            $table->unsignedBigInteger('iproject_id_fk')->default(1);
            $table->foreign('iproject_id_fk')->references('iproject_id')->on('projects')->onDelete('cascade');

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
        Schema::dropIfExists('defaultdatas');
    }
}
