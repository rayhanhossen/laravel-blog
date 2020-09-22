<?php

namespace App\Models;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'thumbnail',
        'name',
        'slug',
        'is_published'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'foreign_key');
    }

    public function posts()
    {
        return $this->belongsToMany('App\Models\Post', 'category_posts');
    }
    
}
