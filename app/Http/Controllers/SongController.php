<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNewSongRequest;
use App\Http\Requests\EditSongRequest;
use App\Models\Like;
use App\Models\Singer;
use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{

    public function Create(CreateNewSongRequest $request)
    {
        $Singer = Singer::find($request->ArtistId);
        $PhotoName = $request->Name . '.' .$request->Photo->extension();
        $SongFileName = $request->Name . '.' . $request->SongFile->getClientOriginalExtension();
        $request->Photo->move(public_path($Singer->Name.'/songs/photo'), strtolower($PhotoName));
        $request->SongFile->move(public_path($Singer->Name.'/songs/files'), strtolower($SongFileName));
        $Song = Song::Create([
            'Name'=>$request->Name,
            'ArtistId'=>$request->ArtistId,
            'Photo'=>strtolower($PhotoName),
            'File'=>strtolower($SongFileName),
        ]);
        return redirect()->back();
    }

    public function Edit(EditSongRequest $request, $id){
        $Song = Song::find($id);
        if($Song == null)
            return redirect()->back();
        $Song->update($request->validated());
        return redirect()->back();
    }

    public function Delete($id)
    {
        Song::destroy($id);
        return redirect()->back();
    }

    public function LikeSong($id){
        $UserId = session('Id');
        Like::Create([
            'SongId'=>$id,
            'UserId'=>$UserId,
        ]);
        return redirect()->back();
    }
    public function UnLikeSong($id){
        Like::destroy($id);
        return redirect()->back();
    }
}
