<?php

namespace App\Http\Controllers;

use App\Contenu_elements;
use App\Http\Requests\HeaderRequest;
use App\Images;
use Illuminate\Http\Request;

class ElementsController extends Controller
{
    public function modifElement(HeaderRequest $request){
        $element = Contenu_elements::findOrFail($request->id);
        $element->titre_element = $request->HeaderTitle;
        $element->contenu_element = $request->HeaderContenu;
        if ($request->hasFile('photo')) {
            if($request->file('photo')->isValid()){
                $path = $request->photo->storeAs('images/elements', $request->photo->getClientOriginalName());
                $extension = $request->photo->extension();
                $image = new Images();
                $imageid = $image->saveImage($request->photo->getClientOriginalName(), $extension, $path);
                $element->id_image = $imageid;
            }
        }
        $element->save();
        return back();
    }

}
