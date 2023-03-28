<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;

    protected $fillable =[
        'UserId',
        'SingerId'
    ];


    public function Singer(){
        return $this->hasMany(Singer::class,'SingerId');
    }
}
