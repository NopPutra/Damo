<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Type;

class Product extends Model
{

    // protected $table = "products";
    protected $fillable = ['name', 'price', 'image', 'type_id', 'description'];

    use HasFactory;

    public function type(){
        return $this->belongsTo(Type::class);
    }
}
