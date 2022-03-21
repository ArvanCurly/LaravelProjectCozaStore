<?php

namespace App\Models;

use App\Models\Produit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name','image'];

    protected $casts = [
        'image' => 'array'
    ];


    public function produits()
    {
        return $this->belongsToMany(Produit::class);
    }

}
