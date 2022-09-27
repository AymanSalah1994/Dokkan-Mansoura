<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('slug')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->unique()->nullable();
            $table->string('city')->nullable();
            $table->text('address')->nullable();
            $table->string('wallet')->nullable();
            $table->string('points')->nullable();
            $table->string('password');
            $table->tinyInteger('role_as')->default('0');
            $table->string('google_id')->nullable();
            $table->string('facebook_id')->nullable();
            $table->string('bio')->nullable();
            $table->string('fb_link')->nullable();
            $table->string('youtube_vid')->nullable();
            $table->string('profile_picture')->nullable();
            // 0 Customer , 1 Admin  , 2 Merchant  , 3 Dealer
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
