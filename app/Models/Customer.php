<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['fullname', 'email'];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public $timestamps = false;
}
