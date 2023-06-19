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
        Schema::create('anims', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100)->nullable();
            $table->foreignId('profile_id')->constrained("profiles");
            $table->integer("s_count")->default(0);
            $table->boolean("judge")->default(false);
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
        Schema::dropIfExists('anims');
    }
};
