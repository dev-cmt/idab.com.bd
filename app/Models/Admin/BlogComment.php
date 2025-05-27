<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\BlogPost;
use App\Models\User;

class BlogComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'blog_post_id',
        'user_id',
        'comment',
        'approved_at'
    ];

    public function blogPost()
    {
        return $this->belongsTo(BlogPost::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
