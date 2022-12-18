<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class TakeawayOrder extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    ];

    public function items()
    {
        return $this->belongsToMany(Item::class,'takeaway_order_item');
    }
}
