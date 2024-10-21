<?php

use App\Models\Group;
use App\Models\User;
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
        Schema::create('group_user', function (Blueprint $table) {
            $table->primary(['group_id', 'user_id']);
            $table->foreignIdFor(Group::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->enum('status', ['approved', 'pending', 'rejected']);
            $table->enum('role', ['admin', 'moderator', 'user']);
            $table->timestamp('created_at');

            // For member invitation token
            $table->string('token', 1024)->nullable();
            $table->boolean('token_authority')->nullable()->default(false); // true - has authority, false - doesn't have authority
            $table->timestamp('token_expiry_date')->nullable();
            $table->timestamp('token_used')->nullable();
            $table->timestamp('token_created_at')->nullable();
            $table->foreignId('token_created_by')->nullable()->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_users');
    }
};
