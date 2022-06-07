<?php

namespace App\Models\Market;

use App\Models\User;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory ,SoftDeletes ,Sluggable;

    public function sluggable(): array{
        return [
            "slug" => [
                "source" => "name"
            ]
        ];
    }

    protected $casts = ['image' => "array"];

    protected $fillable = ['name' , 'introduction' , 'slug' , 'image' , 'weight' , 'length', 'width', 'height', 'price', 'status', 'marketable', 'tags', 'sold_number', 'frozen_number', 'marketable_number', 'brand_id', 'category_id', 'published_at'];

    public function category(){
        return $this->belongsTo(ProductCategory::class, "category_id");
    }

    public function brand(){
        return $this->belongsTo(Brand::class, "brand_id");
    }

    public function metas(){
        return $this->hasMany(ProductMeta::class);
    }

    public function colors(){
        return $this->hasMany(ProductColor::class);
    }

    public function guarantees(){
        return $this->hasMany(ProductGuarantee::class);
    }

    public function images(){
        return $this->hasMany(ProductImage::class);
    }

    public function values(){
        return $this->hasMany(CategoryValue::class);
    }

    public function amazingSale(){
        return $this->hasMany(AmazingSale::class);
    }

    public function comments(){
        return $this->morphMany("App\Models\Content\Comment", "commentable");
    }

//    public function orderItems(){
//        return $this->hasMany(OrderItem::class);
//    }

    public function activeAmazingSale(){
        return $this->amazingSale()->where("start_date", "<", Carbon::now())->where("end_date", ">", Carbon::now())->first();
    }

    public function activeComments(){
        return $this->comments()->where("approved", 1)->where("status", 1)->where("parent_id", NULL)->get();
    }

    public function user(){
        return $this->belongsToMany(User::class);
    }
}
