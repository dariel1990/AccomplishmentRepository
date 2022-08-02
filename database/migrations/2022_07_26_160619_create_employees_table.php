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
            $table->bigInteger('trans_no');
            $table->string('employee_id')->primary();
            $table->string('lastname', 60);
            $table->string('firstname', 60);
            $table->string('middlename', 60)->nullable();
            $table->string('extension')->nullable();
            $table->date('date_birth')->nullable();
            $table->string('place_birth')->nullable();
            $table->enum('sex', ['male', 'female', ''])->default('male');
            $table->string('civil_status')->nullable();
            $table->string('civil_status_others')->nullable();
            $table->decimal('height', 11, 2)->nullable();
            $table->decimal('weight', 11, 2)->nullable();
            $table->string('blood_type')->nullable();
            $table->string('gsis_id_no')->default('*')->nullable();
            $table->string('gsis_policy_no')->default('*')->nullable();
            $table->string('gsis_bp_no')->default('*')->nullable();
            $table->string('pag_ibig_no')->default('*')->nullable();
            $table->string('philhealth_no')->default('*')->nullable();
            $table->string('sss_no')->default('*')->nullable();
            $table->string('tin_no')->default('*')->nullable();
            $table->string('lbp_account_no')->default('*')->nullable();
            $table->string('dbp_account_no')->default('*')->nullable();
            $table->string('agency_employee_no')->default('*')->nullable();
            $table->string('citizenship')->nullable();
            $table->string('citizenship_by')->nullable();
            $table->string('indicate_country')->nullable();
            $table->string('residential_house_no')->nullable();
            $table->string('residential_street')->nullable();
            $table->string('residential_village')->nullable();
            $table->string('residential_barangay')->nullable();
            $table->string('residential_city')->nullable();
            $table->string('residential_province')->nullable();
            $table->string('residential_zip_code')->nullable();
            $table->string('permanent_house_no')->nullable();
            $table->string('permanent_street')->nullable();
            $table->string('permanent_village')->nullable();
            $table->string('permanent_barangay')->nullable();
            $table->string('permanent_city')->nullable();
            $table->string('permanent_province')->nullable();
            $table->string('permanent_zip_code')->nullable();
            $table->string('telephone_no')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('email_address')->nullable();
            $table->integer('status')->default(0)->nullable();
            $table->date('first_day_of_service')->nullable();
            $table->enum('active_status', ['active', 'in-active'])->default('active');
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
        Schema::dropIfExists('employees');
    }
}
