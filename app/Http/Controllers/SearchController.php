<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Singer;
use App\Models\Song;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function Search(SearchRequest $request){
        $SingersResult = Singer::where('Name','LIKE',"%{$request->Name}%")->get();
        $SongsResult = Song::where('Name','LIKE',"%{$request->Name}%")->get();
        return redirect()->back()->with([
            'SingersResult'=>$SingersResult,
            'SongsResult'=>$SongsResult,
        ]);
    }
}
