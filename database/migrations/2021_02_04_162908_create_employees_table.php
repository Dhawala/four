<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('last_name',60);
            $table->string('first_name', 6);
            $table->string('middle_name',60)->nullable();
            $table->string('address', 120);
            $table->integer('department_id')->unsigned();
            $table->foreign('department_id')->references('id')->on('departments')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->integer('city_id')->unsigned();
            $table->foreign('city_id')->references('id')->on('cities')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->integer("state_id")->unsigned();
            $table->foreign('state_id')->references('id')->on('states')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->integer('country_id')->unsigned();
            $table->foreign('country_id')->references('id')->on('country')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->char('zip', 10);
            $table->date('birthdate');
            $table->date('date_hired');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
