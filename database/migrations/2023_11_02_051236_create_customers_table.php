<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('surname');
            $table->string('email')->nullable();
            $table->string('mobile_no')->unique();
            $table->string('address');
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('village')->nullable();
            $table->integer('pincode')->nullable();
            $table->string('alternate_mobile_no')->nullable()->unique();
            $table->string('adhar_card')->nullable();
            $table->string('finance_name')->nullable();
            $table->string('finance_address')->nullable();
            $table->string('executive_name')->nullable();
            $table->string('Dealer_name')->nullable();
            $table->string('vehicle_type')->nullable();
            $table->string('vehicle_registration_no')->nullable();
            $table->integer('vehicle_registration_year')->nullable();
            $table->string('chasis_no')->nullable();
            $table->string('engine_no')->nullable();
            $table->string('fuel_type')->nullable();
            $table->string('insurance_company_name')->nullable();
            $table->string('rc_book')->nullable();
            $table->string('insurance_file')->nullable();
            $table->string('loan_amount')->nullable();
            $table->string('loan_surakhya_vimo')->nullable();
            $table->string('iho')->nullable();
            $table->string('file_charge')->nullable();
            $table->string('road_side_assite')->nullable();
            $table->string('rto_charge')->nullable();
            $table->string('hold_for_insurance')->nullable();
            $table->string('final_total_amount')->nullable();
            $table->string('bank_account_holder_name')->nullable();
            $table->string('account_no')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('branch_name')->nullable();
            $table->string('ifsc_code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
