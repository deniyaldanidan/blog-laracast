<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "excerpt",
        "body",
        "slug",
        "category_id"
    ];

    // protected $guarded = ["id"];

    //* Eager load defaults
    // protected $with = ['category', 'author'];

    /*
    //* Following method will make slug as a default route binder. If this is removed default will be id aka Primary Key
    public function getRouteKeyName()
    {
        return "slug";
    }
    */

    //* Additional Methods
    public function scopeFilter(Builder $query, array $filters)
    {
        $query->when($filters['search'] ?? false, function (Builder $query, string $search) {
            $query->where(function (Builder $query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%')
                    ->orWhere('excerpt', 'like', '%' . $search . '%');
            });
        });

        $query->when($filters['category'] ?? false, function (Builder $query, string $category) {
            $query->whereHas('category', fn(Builder $query) => $query->where('slug', $category));
        });

        $query->when($filters['author'] ?? false, function (Builder $query, string $author) {
            $query->whereHas('author', fn(Builder $query) => $query->where('username', $author));
        });
    }

    //*Relations
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
