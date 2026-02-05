<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    // បន្ថែមបន្ទាត់ខាងក្រោមនេះ
    protected $fillable = ['name', 'price', 'description', 'image'];
}
