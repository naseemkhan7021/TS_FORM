<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeptDefaultDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('dept_default_docs')) {
            Schema::create('dept_default_docs', function (Blueprint $table) {
                $table->id('ddd_id');
                $table->integer('sr_no')->default(0);
                $table->string('document_name', 191)->nullable();
                $table->string('document_code', 10)->nullable();

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
        Schema::dropIfExists('dept_default_docs');
    }
}
