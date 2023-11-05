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
        Schema::table('customers', function (Blueprint $table) {
            //
            $table->string('loan_status')->after('hold_for_insurance')->nullable();
            $table->string('user_id')->after('ifsc_code')->nullable();
            $table->string('remark_loan_detail')->after('final_total_amount')->nullable();
            $table->string('remark_customer_detail')->after('adhar_card')->nullable();
            $table->string('interest_rate')->after('loan_amount')->nullable();
            $table->string('loan_term')->after('loan_amount')->nullable();
            $table->string('emi')->after('loan_amount')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            //
        });
    }
};
