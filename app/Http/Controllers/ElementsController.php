<?php

namespace App\Http\Controllers;

use App\Contenu_elements;
use App\Http\Requests\HeaderRequest;
use App\Images;
use Illuminate\Http\Request;

class ElementsController extends Controller
{
    public function modifElement(Request $request){
        $element = Contenu_elements::findOrFail($request->id);
        $element->titre_element = $request->Title;
        $element->contenu_element = $request->Contenu;
        if($request->Lien !='autre'){
            $element->lien_next = $request->Lien;
        }else{
            $element->lien_next=$request->Lien_particulier;
        }
        if ($request->hasFile('photo')) {
            if($request->file('photo')->isValid()){
                $path = $request->photo->storeAs('/images/elements', $request->photo->getClientOriginalName());
                $extension = $request->photo->extension();
                $image = new Images();
                $imageid = $image->saveImage($request->photo->getClientOriginalName(), $extension, $path);
                $element->id_image = $imageid;
            }
        }
        $element->save();
        return back();
    }

    public function addElement(Request $request){
//        dd($request);
        $element = new Contenu_elements;
        $element->titre_element = $request->Title;
        $element->contenu_element = $request->Contenu;
        $element->id_element = $request->id_element;
        if ($request->hasFile('photo')) {
            if($request->file('photo')->isValid()){
                $path = $request->photo->storeAs('/images/elements', $request->photo->getClientOriginalName());
                $extension = $request->photo->extension();
                $image = new Images();
                $imageid = $image->saveImage($request->photo->getClientOriginalName(), $extension, $path);
                $element->id_image = $imageid;
            }
        }
        $element->save();
        return back();
    }

    public function delElement(Request $request){
        $element = Contenu_elements::findOrFail($request->id);
        $element->delete();
        return back();
    }

}
