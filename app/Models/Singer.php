<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Singer extends Model
{
    use HasFactory;
    protected $table = 'singer';

    protected $fillable = [
        'Name',
        'Age',
        'Bio',
        'Picture',
    ];
    public function Songs(){
        return $this->hasMany(Song::class,'ArtistId');
    }
    public function Follower(){
        return $this->hasMany(Follow::class,'SingerId');
    }
    public function Following(){
        return $this->hasMany(Follow::class,'UserId');
    }
}
