<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('joyride', function (Blueprint $table) {
            $table->unique('ride_uuid','rider_uuid');
            // $table->uuid('rider_uuid');
            // $table->unique('ride_uuid', 'rider_uuid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('joyride');
    }
};
