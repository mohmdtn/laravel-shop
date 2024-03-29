<?php

namespace App\Models\Market;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Copan extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ["code", "amount", "amount_type", "type", "discount_ceiling", "status", "start_date", "end_date", "user_id"];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function Order(){
        return $this->hasOne(Order::class);
    }
}
