<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{

    public function up(): void{

        Schema::create('audits', function (Blueprint $table){

            $table->id();
            $table->string('action');
            $table->string('table', length: 15);
            $table->string('ip', length: 20);
            $table->json('date_before')->nullable();
            $table->json('date_after')->nullable();
            $table->timestamps();

            $table->foreignId('user_id')
            ->constrained()
            ->CascadeOnDelete();

        });

    }

    public function down(): void{

        Schema::dropIfExists('audits');

    }

};