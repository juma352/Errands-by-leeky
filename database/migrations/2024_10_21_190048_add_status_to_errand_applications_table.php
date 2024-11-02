<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToErrandApplicationsTable extends Migration
{
    public function up()
    {
        Schema::table('errand_applications', function (Blueprint $table) {
            $table->string('status')->default('pending'); // Set default status if needed
        });
    }

    public function down()
    {
        Schema::table('errand_applications', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}