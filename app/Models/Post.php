<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model{  // tabel blog_laravel11
    // protected $table = 'blog_posts';
    // protected $primarykey = 'article_id';

    protected $fillable = ['title', 'author', 'slug', 'body'];
}