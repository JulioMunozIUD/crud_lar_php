<?php

namespace App\Models;

use App\Models\categories;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class posts extends Model
{
    use HasFactory;
    //protected $fillable = ['name', 'category_id', 'description', 'posted', 'state'];

    public function categories(){
        return $this->belongsTo(categories::class,'category_id', 'id');
    }
}



