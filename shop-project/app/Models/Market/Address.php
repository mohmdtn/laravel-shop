<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory,SoftDeletes;

    public function getRecipientFullNameAttribute(){
        return "{$this->recipient_first_name} {$this->recipient_last_name}";
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }
}
