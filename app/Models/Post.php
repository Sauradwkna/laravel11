<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model{  
    use HasFactory;

    // tabel blog_laravel11
    // protected $table = 'blog_posts';
    // protected $primarykey = 'article_id';

    protected $fillable = ['title', 'author', 'slug', 'body'];

    protected $with = ['author', 'category'];

    public function author(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function scopeFilter(Builder $query, array $filters): void {

        // if(isset($filters['search']) ? $filters['search'] : false) {
        //     $query->where('title', 'like', '%' . request('search') . '%');
        // }

        $query->when(
            $filters['search'] ?? false, 
            fn ($query, $search) =>
            $query->where('title', 'like', '%' . $search . '%')
        );

        $query->when(
            $filters['category'] ?? false, 
            fn ($query, $category) =>
            $query->wherehas('category', fn($query) => $query->where('slug', $category))
        );

        $query->when(
            $filters['author'] ?? false, 
            fn ($query, $author) =>
            $query->wherehas('author', fn($query) => $query->where('username', $author))
        );
    }
}