<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable = [ 'name' , 'description' , 'price'];
    
    public function products(){
        return $this->hasMany(Product::class);
    }
}
