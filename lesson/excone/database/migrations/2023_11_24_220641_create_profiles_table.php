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
        Schema::create('profiles', function (Blueprint $table) {
                $table->increments("id");
                $table->string("givenname",100);
                $table->string("familyname",100);
                $table->enum("gender",array("male","female","unisex"))->default("female");
                $table->text("bio");
                $table->unsignedBigInteger('user_id');
                $table->timestamp("created_at")->useCurrent();
                $table->timestamp("updated_at")->nullable()->useCurrentOnUpdate();
         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
