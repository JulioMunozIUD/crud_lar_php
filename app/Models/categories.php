<?php

namespace App\Models;

use App\Models\posts;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class categories extends Model
{
    use HasFactory;
    protected $table = 'categories';

    public function posts(){
        return $this->hasMany(Posts::class, 'name', 'description');
    }

}
