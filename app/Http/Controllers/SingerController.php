<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNewSingerRequest;
use App\Http\Requests\EditSingerRequest;
use App\Models\Singer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SingerController extends Controller
{
    //

    public function Create(CreateNewSingerRequest $request)
    {
    
       $PictureName = $request->Name.'.'.$request->Picture->extension();
       $request->Picture->move(public_path($request->Name), strtolower($PictureName));
       $S = Singer::Create([
        'Name'=>$request->Name,
        'Age'=>$request->Age,
        'Bio'=>$request->Bio,
        'Picture'=>strtolower($PictureName),
       ]);
       return redirect()->back();
    }

    public function Edit(EditSingerRequest $request, $id){
        $Singer = Singer::find($id);
        if($Singer == null)
            return redirect()->back();
        $Singer->update($request->validated());
        return redirect()->back();
    }
    public function Delete($id){
        Singer::destroy($id);
        return redirect()->back();
    }
}
