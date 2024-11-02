<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('errand_applications', function (Blueprint $table) {
            $table->unsignedBigInteger('customer_id')->nullable(); // Add customer_id column
            $table->foreign('customer_id')->references('id')->on('users')->onDelete('set null'); // Add foreign key constraint
        });
    }
    
    public function down()
    {
        Schema::table('errand_applications', function (Blueprint $table) {
            $table->dropForeign(['customer_id']);
            $table->dropColumn('customer_id');
        });
    }
};