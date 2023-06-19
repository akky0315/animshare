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
        Schema::create('profile_anims', function (Blueprint $table) {
            $table->foreignId('anim_id')->constrained('anims');
            $table->foreignId('from_profile_id')->constrained('profiles');
            $table->primary(['anim_id', 'from_profile_id']);
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
        Schema::dropIfExists('profile_anims');
    }
};
