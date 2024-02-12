<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Products extends Model
{
    use HasFactory;
    protected $guarded = [];
    // protected $fillable = ['name', 'description'];
    protected $hidden = ['created_at', 'updated_at'];
    protected $table = 'productos';

    public function categorias(): BelongsToMany {
        return $this->belongsToMany(Categoria::class, 'producto_categoria', 'producto_id', 'categoria_id');
    }
}