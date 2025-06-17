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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }

    /*
    INSERT INTO users (name, email, password, created_at, updated_at) VALUES
    ('Andi Pratama', 'andi@example.com', '$2y$10$TKh8H1.PfQxF.9A0t2eKzO1JEV4OM5FcDJPFv/FGd59kQS5cD6aHa', NOW(), NOW()),
    ('Budi Santoso', 'budi@example.com', '$2y$10$TKh8H1.PfQxF.9A0t2eKzO1JEV4OM5FcDJPFv/FGd59kQS5cD6aHa', NOW(), NOW()),
    ('Citra Dewi', 'citra@example.com', '$2y$10$TKh8H1.PfQxF.9A0t2eKzO1JEV4OM5FcDJPFv/FGd59kQS5cD6aHa', NOW(), NOW()),
    ('Dodi Irawan', 'dodi@example.com', '$2y$10$TKh8H1.PfQxF.9A0t2eKzO1JEV4OM5FcDJPFv/FGd59kQS5cD6aHa', NOW(), NOW()),
    ('Eka Wulandari', 'eka@example.com', '$2y$10$TKh8H1.PfQxF.9A0t2eKzO1JEV4OM5FcDJPFv/FGd59kQS5cD6aHa', NOW(), NOW()),
    ('Fajar Nugraha', 'fajar@example.com', '$2y$10$TKh8H1.PfQxF.9A0t2eKzO1JEV4OM5FcDJPFv/FGd59kQS5cD6aHa', NOW(), NOW()),
    ('Gita Ramadhani', 'gita@example.com', '$2y$10$TKh8H1.PfQxF.9A0t2eKzO1JEV4OM5FcDJPFv/FGd59kQS5cD6aHa', NOW(), NOW()),
    ('Hendra Saputra', 'hendra@example.com', '$2y$10$TKh8H1.PfQxF.9A0t2eKzO1JEV4OM5FcDJPFv/FGd59kQS5cD6aHa', NOW(), NOW()),
    ('Indah Lestari', 'indah@example.com', '$2y$10$TKh8H1.PfQxF.9A0t2eKzO1JEV4OM5FcDJPFv/FGd59kQS5cD6aHa', NOW(), NOW()),
    ('Joko Susilo', 'joko@example.com', '$2y$10$TKh8H1.PfQxF.9A0t2eKzO1JEV4OM5FcDJPFv/FGd59kQS5cD6aHa', NOW(), NOW());

    */
};
