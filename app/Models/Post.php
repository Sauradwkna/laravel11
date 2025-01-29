<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model{  
    use HasFactory;

    // tabel blog_laravel11
    // protected $table = 'blog_posts';
    // protected $primarykey = 'article_id';

    protected $fillable = ['title', 'author', 'slug', 'body'];

    public function author(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}