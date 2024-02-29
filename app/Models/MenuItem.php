<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(MenuCategory::class);
    }

    public function orderedMenuItems()
    {
        return $this->hasMany(OrderMenuItems::class);
    }
}
