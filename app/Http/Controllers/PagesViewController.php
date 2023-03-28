<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Like;
use App\Models\Singer;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesViewController extends Controller
{
    //

    public function HomePageIndex(){
        $Singers = Singer::all();
        //$Songs = Song::all();
        $Songs =  [];
        $TrendSong = DB::table('likes')
        ->select('SongId', DB::raw('COUNT(id) AS Likes'))
        ->groupBy('SongId')
        ->orderBy('Likes', 'DESC')
        ->limit(10)
        ->get();
      

        foreach($TrendSong as $t){
            
            $Songs += [
                $t->SongId=> Song::find($t->SongId),
            ];
        }

        

        return view('welcome')->with([
            'title'=>'Home Page',
            'Singers'=>$Singers,
            'Songs'=>$Songs,
        ]);
    }

    public function ProfileIndex($Name){
        $Singer = Singer::where('Name',$Name)->first();
        return view('singer.profile')->with([
            'title'=>$Singer->Name ."'s Profile",
            'Singer'=>$Singer,
        ]);
    }

    public function DashboardIndex(){
        $Singers = Singer::all();
        $Songs = Song::all();
        $Admin = Admin::find(session('AID'));
        return view('dashboard.index')->with([
            'title'=>'Dashboard home',
            'Singers'=>$Singers,
            'Songs'=>$Songs,
            'Admin'=>$Admin,
        ]);
    }

    public function ArtistsIndex(){
        $Singers = Singer::all();
        return view('dashboard.singers')->with([
            'title'=>'List Singers',
            'Singers'=>$Singers,
        ]);
    }
    public function SongIndex(){
        $Songs = Song::all();
        $Singers = Singer::all();
        return view('dashboard.songs')->with([
            'title'=>'List Songs',
            'Songs'=>$Songs,
            'Singers'=>$Singers,
        ]);
    }

    public function SearchIndex(){
        return view('search')->with('title','Search for singer or song');
    }
    public function SignInIndex(){
        return view('Auth.signin')->with('title','Sign In');
    }
    public function SignUpIndex(){
        return view('Auth.signup')->with('title','Sign Up');
    }
    public function AdminLogIn(){
        if(session('AID'))
            return redirect(route('dashboard.home'));
        return view('Admin.signin')->with('title','Admin Sign In');
    }
}
