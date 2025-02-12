<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('file_path');
            $table->unsignedBigInteger('batch_id');
            $table->string('uploaded_by'); // Store uploader's name instead of user_id
            $table->timestamps();

            // Foreign key constraint for batch_id
            $table->foreign('batch_id')->references('id')->on('batches')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
