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
        Schema::create('application', function (Blueprint $table) {
            $table->string('id', 15)->primary(); // Auto-incremental primary key
            $table->unsignedBigInteger('user_id');
            $table->string('document_id');
            
            $table->date('application_date');
            $table->string('application_no');
            $table->string('allocated_passport_number', 20)->unique();
            $table->string('service_type');
            $table->string('traveldocument_type');
            $table->string('present_traveldocument_no');
            $table->string('nmrp_no');
            $table->string('nic_no', 12)->unique();
            $table->string('surname');
            $table->string('other_names');
            $table->string('Permanent_address');
            $table->string('district');
            $table->string('dateofbirth');
            $table->string('bc_number');
            $table->string('bc_district');
            $table->string('birth_place');
            $table->boolean('sex');
            $table->string('occupation');
            $table->boolean('dual_citizenship')->default(0);
            $table->string('dual_citizenship_no');
            $table->integer('mobile_no', 15);
            $table->string('email');
            $table->string('applicant_signature');
            $table->string('status');
            

            $table->timestamps(); // Created at and updated at timestamps

            // Define the foreign key constraint
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('document_id')->references('id')->on('document');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application');
    }
};
