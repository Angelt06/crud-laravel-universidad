<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salon extends Model
{
    use HasFactory;
    
    public function universidad()
{
    return $this->belongsTo(Universidad::class, 'universidad_id');
}
}
