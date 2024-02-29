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

    public function orderedMenuItems()
    {
        return $this->hasMany(OrderMenuItems::class);
    }

    public function monitorItems()
    {
        return $this->hasMany(MonitorItem::class);
    }
}
