<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{

    public function up(): void{
        Schema::create('users', function (Blueprint $table){

            $table->id();
            $table->string('name', length: 50);
            $table->string('login', length: 30)->unique();
            $table->string('document', length: 20)->nullable();
            $table->enum('status', ['Ativo', 'Inativo']);
            $table->string('state', length: 30)->nullable();
            $table->string('city', length: 50)->nullable();
            $table->string('telephone', length: 15)->nullable();
            $table->string('email', length: 150)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', length: 150)->nullable();
            $table->string('is_admin', length: 4);
            $table->rememberToken();
            $table->timestamps();

        });

        Schema::create('password_reset_tokens', function (Blueprint $table){

            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();

        });

        Schema::create('sessions', function (Blueprint $table){

            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();

        });

    }

    public function down(): void{

        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');

    }

};