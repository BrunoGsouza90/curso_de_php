<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{

    public function up(): void{

        Schema::create('permissions', function (Blueprint $table){

            $table->id();
            $table->string('name', length: 150);
            $table->text('description')->nullable();
            $table->timestamps();

        });

        Schema::create('permission_user', function (Blueprint $table){
            
            $table->foreignId('user_id')
            ->constrained()
            ->CascadeOnDelete();

            $table->foreignId('permission_id')
            ->constrained()
            ->CascadeOnDelete();

            $table->primary(['permission_id', 'user_id']);

        });

    }

    public function down(): void{

        Schema::dropIfExists('permission_user');
        Schema::dropIfExists('permissions');

    }

};