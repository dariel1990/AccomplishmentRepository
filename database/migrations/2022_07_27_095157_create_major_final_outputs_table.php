<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMajorFinalOutputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('major_final_outputs', function (Blueprint $table) {
            $table->id('mfo_id');
            $table->string('office_code');
            $table->enum('category', ['strategic_prio', 'core_function', 'support_services']);
            $table->text('mfo_desc');
            $table->string('seq_no');
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
        Schema::dropIfExists('major_final_outputs');
    }
}
