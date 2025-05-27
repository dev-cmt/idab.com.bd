<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\BlogComment;
use App\Models\Admin\BlogView;
use App\Models\Admin\BlogShare;
use Illuminate\Support\Str;
use App\Models\User;

class BlogPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'url_slug',
        'image_path',
        'content',
        'author_id',
        'publish_date',
        'published_at',
        'status'
    ];

    protected static function boot()
    {
        parent::boot();
        static::saving(function ($blogPost) {
            $blogPost->url_slug = Str::slug($blogPost->title);
            $count = BlogPost::where('url_slug', $blogPost->url_slug)->count();

            if ($count) {
                $blogPost->url_slug .= '-' . ($count + 1);
            }
        });
    }

    public function comments()
    {
        return $this->hasMany(BlogComment::class);
    }

    public function views()
    {
        return $this->hasMany(BlogView::class);
    }

    public function shares()
    {
        return $this->hasMany(BlogShare::class);
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
