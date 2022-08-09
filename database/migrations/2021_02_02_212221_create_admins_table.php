<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->char('village_id')->nullable();
            $table->string('role')->nullable()->default('0');
            $table->string('destination')->nullable()->default('0');
            $table->string('owner')->nullable()->default('0');
            $table->string('hotel')->nullable()->default('0');
            $table->string('transportation')->nullable()->default('0');
            $table->string('packages')->nullable()->default('0');
            $table->string('booking')->nullable()->default('0');
            $table->string('testimoni')->nullable()->default('0');
            $table->string('type')->nullable()->default('0');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
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
        Schema::dropIfExists('admins');
    }
}
