<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Universidad extends Model
{
    use HasFactory;
    
    public function salones()
    {
        return $this->hasMany(Salon::class);
    }
    
    public static function boot()
    {
        parent::boot();

        
        static::deleting(function ($universidad) {
            
            $universidad->salones()->delete();
        });
    }
}
