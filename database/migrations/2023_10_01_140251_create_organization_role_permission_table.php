<?php

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
        Schema::create('organization_role_permission', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('organization_role_id');
            $table->unsignedBigInteger('permission_id');
            $table->timestamps();

            $table->foreign('organization_role_id')->references('id')->on('organization_roles')->onDelete('cascade');
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organization_role_permission');
    }
};
