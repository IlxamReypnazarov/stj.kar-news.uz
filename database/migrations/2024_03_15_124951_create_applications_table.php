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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");
            $table->string("status")->default("process");
            $table->string("lastname");
            $table->string( "firstname");
            $table->string("jshshir");
            $table->string("gender");
            $table->string("phone");
            $table->integer("region_id");
            $table->integer("district_id");
            $table->integer("quarter_id");
            $table->string("street");
            $table->integer("faculty_id");
            $table->integer("profession_id");
            $table->integer("group_id");
            $table->string("privelege_name");
            $table->string('privelege_file');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
