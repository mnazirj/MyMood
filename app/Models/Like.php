<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    
    protected $fillable =[
        'SongId',
        'UserId',
    ];
    
    public function Song(){
        return $this->hasMany(Song::class,'id','SongId');
    }
}
