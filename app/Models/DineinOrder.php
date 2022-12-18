<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class DineinOrder extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'table_number','service_charge','waiter_name',
    ];

    public function table()
    {
        return $this->belongsTo(Table::class);
    }

    public function items()
    {
        return $this->belongsToMany(Item::class);
    }
}
