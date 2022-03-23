<?php

namespace App\Models;

use App\Models\Type;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produit extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = ['titre', 'taille', 'couleur', 'material','prix','dimension','poid','description','image','type_id'];

    protected $casts = [
        'taille' => 'array',
        'couleur' => 'array',
        'image' => 'array'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }


}
