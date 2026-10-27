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
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('status');
        });

        Schema::table('posts', function (Blueprint $table) {
            // Backed by App\Enums\StatusEnum (Draft = 0, Published = 1, Archived = 2)
            $table->unsignedTinyInteger('status')->default(0)->after('content');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('status');
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->string('status')->default('draft')->after('content');
        });
    }
};
