<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;
    
    protected $table = 'song';
    protected $fillable = [
        'Name',
        'ArtistId',
        'File',
        'Photo',
    ];
    public function Singer(){
        return $this->hasOne(Singer::class ,'id','ArtistId');
    }
    public function Likes(){
        return $this->hasMany(Like::class ,'SongId');
    }
}
