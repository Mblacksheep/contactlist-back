<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('contact_type_id');
            $table->bigInteger('contact_owner_id');
            $table->string('contact_value');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('contact_type_id')->references('id')->on('contact_types'); 
            $table->foreign('contact_owner_id')->references('id')->on('people'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
