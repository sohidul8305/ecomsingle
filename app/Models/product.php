<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;    protected $fillable = [
        'product_name',
        'category_id',
        'category_name',
        'slug',
    ];
}
