<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'sale_date', 'total'];

    public function sold_items()
    {
        return $this->hasMany(SoldItem::class);
    }

    public $timestamps = false;
}
