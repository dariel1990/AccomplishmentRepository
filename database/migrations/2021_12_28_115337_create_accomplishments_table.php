<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccomplishmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accomplishments', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('control_no');
            $table->string('office');
            $table->timestamp('request_date', $precision = 0);
            $table->timestamp('date_acted', $precision = 0);
            $table->timestamp('date_completed', $precision = 0);
            $table->string('problem');
            $table->string('solution');
            $table->string('requested_by');
            $table->string('approved_by');
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
        Schema::dropIfExists('accomplishments');
    }
}
