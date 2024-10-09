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
            $table->string('customer_name');
            $table->foreignIdFor(\App\Models\User::class)->constrained()->nullable()->constrained();
            $table->string('email', 92)->default('');
            $table->string('phone_number')->default('');
            $table->string('address')->default('');
            $table->timestamps();
        });
        Schema::table('errands',function(Blueprint $table){
             $table->foreignIdFor(\App\Models\Customer::class)->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('errands', function(Blueprint $table){
            $table->dropForeignIdFor(\App\Models\Customer::class);
        });
        Schema::dropIfExists('customers');
    }
};
