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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            // $table->unsignedBigInteger('author_id');
            // $table->foreign('author_id')->references('id')->on('users');
            $table->foreignId('author_id')->constrained(
                table: 'users',
                indexName: 'posts_author_id'
            );
            $table->string('slug')->unique();
            $table->text('body');
            $table->timestamps();
        });
    }
    // php artisan make:model Post -m (untuk membuat model sekaligus migrasi)

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
// App\Models\Post::create(['title' => 'Article Title 3' , 'author' => 'Gregory
// ','slug' => 'article-title-3','body' => 'Build robust, full-stack applications
//  in PHP using Laravel and Livewire. Love JavaScript? Build a monolithic React 
// or Vue driven frontend by pairing Laravel with Inertia.']);