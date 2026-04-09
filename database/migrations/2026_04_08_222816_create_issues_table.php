<?php

use App\Enums\IssueStatusEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('CASCADE');
            $table->foreignId('assignee_id')->nullable()->constrained('users');
            $table->enum('status', array_column(IssueStatusEnum::cases(), 'value'))->default(IssueStatusEnum::OPEN->value);
            $table->string('title')->nullable(false);
            $table->text('description')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issues');
    }
};
