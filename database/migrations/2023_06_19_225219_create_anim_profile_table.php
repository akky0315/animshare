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
        Schema::create('anim_profile', function (Blueprint $table) {
            $table->foreignId('anim_id')->constrained('anims');
            $table->foreignId('profile_id')->constrained('profiles');
            $table->primary(['anim_id', 'profile_id']);
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
        Schema::dropIfExists('anim_profile');
    }
};
