<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationRequirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('organization_requirements')) {
            Schema::create('organization_requirements', function (Blueprint $table) {
                $table->id('organization_requirement_id');
                $table->tinyInteger('organization_requirement_value');
                $table->string('organization_requirement_description', 150);
                $table->string('organization_requirement_abbr', 20);
                $table->string('organization_requirement_detail', 400);

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
        Schema::dropIfExists('organization_requirements');
    }
}
