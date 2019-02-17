<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('district_id');
            $table->unsignedInteger('user_id');
            $table->string('festival_name');
            $table->string('festival_type');
            $table->date('from');
            $table->date('to');
            $table->string('festival_place');
            $table->string('festival_place_attach');
            $table->string('reg_no');
            $table->string('reg_no_attach');
            $table->string('tin_no');
            $table->string('tin_no_attach');
            $table->string('vat_reg_no')->nullable();
            $table->string('vat_reg_no_attach')->nullable();
            $table->string('chaalan_no');
            $table->date('date');
            $table->string('bank_name');
            $table->string('branch_name');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
