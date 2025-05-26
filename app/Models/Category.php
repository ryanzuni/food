<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Jika nanti ingin relasi ke Food
    public function foods()
    {
        return $this->hasMany(Food::class);
    }
}
