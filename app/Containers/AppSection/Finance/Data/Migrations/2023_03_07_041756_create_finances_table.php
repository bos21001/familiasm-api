<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('finances', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('group_id')->nullable();
            $table->string('name')->nullable();
            $table->string('type')->nullable();
            $table->float('value')->nullable();
            $table->longText('description')->nullable();
            $table->boolean('repeats')->nullable();
            $table->boolean('business_day_only')->nullable();
            $table->integer('repeat_every')->nullable();
            $table->string('repetition_period')->nullable();
            $table->timestamp('ends')->nullable();
            $table->timestamps();
        });

        Schema::create('finance_historys', function (Blueprint $table) {
            $table->id();
            $table->integer('finance_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->float('value')->nullable();
            $table->timestamp('date')->nullable();
            $table->string('action')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });

        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('name')->nullable();
            $table->integer('description')->nullable();
            $table->timestamps();
        });

        Schema::create('group_users', function (Blueprint $table) {
            $table->integer('group_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('finances');
        Schema::dropIfExists('finance_historys');
        Schema::dropIfExists('groups');
        Schema::dropIfExists('group_has_users');
    }
};
