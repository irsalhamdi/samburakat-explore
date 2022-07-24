<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDestinationPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destination_packages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('destination_id')->nullable();
            $table->unsignedBigInteger('package_id')->nullable();
            $table->timestamps();

            $table->foreign('destination_id')->references('id')->on('destinations')->onDelete('cascade');
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('destination_packages');
    }
}
