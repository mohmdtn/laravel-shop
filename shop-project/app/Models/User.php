<?php

namespace App\Models;

use App\Models\Market\Address;
use App\Models\Market\Compare;
use App\Models\Market\Order;
use App\Models\Market\OrderItem;
use App\Models\Market\Payment;
use App\Models\Market\Product;
use App\Models\Ticket\Ticket;
use App\Models\Ticket\TicketAdmin;
use App\Models\User\Permission;
use App\Models\User\Role;
use App\Traits\Permissions\HasPermissionsTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Nagy\LaravelRating\Traits\CanRate;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use SoftDeletes;
    use CanRate;

    use HasPermissionsTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'mobile',
        'email',
        'status',
        'password',
        'user_type',
        'activation',
        'profile_photo_path',
        'national_code',
        'email_verified_at',
        'mobile_verified_at',
        'national_code'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function getFullNameAttribute(){
        return "{$this->first_name} {$this->last_name}";
    }

    public function ticketAdmin(){
        return $this->hasOne(TicketAdmin::class);
    }

    public function tickets(){
        return $this->hasMany(Ticket::class);
    }


    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    public function permissions(){
        return $this->belongsToMany(Permission::class);
    }

    public function payments(){
        return $this->hasMany(Payment::class);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function addresses(){
        return $this->hasMany(Address::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class);
    }

    public function orderItems(){
        return $this->hasManyThrough(OrderItem::class, Order::class);
    }

    public function compare(){
        return $this->hasOne(Compare::class);
    }

    public function isUserPurchedProduct($product_id){
        $productIds = collect();
//        foreach (auth()->user()->orders()->with("orderItems")->get() as $order){
//            foreach ($order->orderItems->where('product_id', $product_id) as $item){
//                $productIds->push($item->product_id);
//            }
//        }
        foreach ($this->orderItems()->where('product_id', $product_id)->get() as $item){
            $productIds->push($item->product_id);
        }
        $productIds = $productIds->unique();
        return $productIds;
    }
}
