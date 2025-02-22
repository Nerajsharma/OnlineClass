<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('project_id')->unique(); // Unique Project ID
            $table->foreignId('uploader_id')->constrained('users')->onDelete('cascade'); // Link to users table
            $table->string('projectname');
            $table->string('projectlang');
            $table->string('project_file'); // File path
            $table->string('projectmode'); // File path
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('projects');
    }
};

