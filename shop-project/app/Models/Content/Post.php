<?php

namespace App\Models\Content;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory ,SoftDeletes ,Sluggable;

    public function sluggable(): array{
        return [
            "slug" => [
                "source" => "title"
            ]
        ];
    }

    protected $casts = ['image' => "array"];

    protected $fillable = ['title', 'summary', 'body', 'slug', 'image', 'status', 'tags', 'published_at', 'author_id', 'category_id', 'commentable'];

    public function postCategory(){
        return $this->belongsTo(PostCategory::class , "category_id");
    }

    public function comments(){
        return $this->morphMany("App\Models\Content\Comment", "commentable");
    }

    public function activeComments(){
        return $this->comments()->where("approved", 1)->where("status", 1)->where("parent_id", NULL)->get();
    }

}
