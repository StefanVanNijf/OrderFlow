<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    

    public function table()
    {
        return $this->belongsTo(Table::class);
    }

    public function orderedProducts()
    {
        return $this->hasMany(OrderedProduct::class);
    }

    public function monitorItems()
    {
        return $this->hasMany(MonitorItem::class);
    }
}
