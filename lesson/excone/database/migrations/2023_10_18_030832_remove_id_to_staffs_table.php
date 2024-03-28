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
        if(Schema::hasColumn('staffs','id')){
            Schema::table('staffs', function (Blueprint $table) {
                $table->dropColumn('id');
            });
        }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if(!Schema::hasColumn('staffs','id')){
            Schema::table('staffs', function (Blueprint $table) {
                $table->string('id')->first();
            });
        }
    }
};
