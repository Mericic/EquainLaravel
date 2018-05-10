<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class PagesController extends Controller
{
    private $header;
    private $page;

    public function getPage(){
        $this->page=Route::getFacadeRoot()->current()->uri();
//        dd(Route::getFacadeRoot()->current()->uri());
        if(Page::where('nom_page', '=', $this->page)->first()){
            $this->header = Page::join('elements', 'pages.id', '=', 'elements.id_page')
                ->join('contenu_elements', 'elements.id', '=', 'contenu_elements.id_element')
                ->join('images', 'contenu_elements.id_image', '=', 'images.id')
                ->where('elements.nom_element', '=', 'header')
                ->where('pages.nom_page', '=', $this->page)
                ->first();
            switch(Route::getFacadeRoot()->current()->uri()){
                case 'structure':
                    return $this->structure();
                    break;
                case 'equipe':
                    return $this->equipe();
                    break;
                case 'cavalerie':
                    return $this->cavalerie();
                    break;
                case 'activite':
                    return $this->activite();
                    break;
            }
        }else{
            return view('errors.404');
        }
    }

    public function structure(){
        $moyens = Page::join('elements', 'pages.id', '=', 'elements.id_page')
            ->join('contenu_elements', 'elements.id', '=', 'contenu_elements.id_element')
            ->join('images', 'contenu_elements.id_image', '=', 'images.id')
            ->where('elements.nom_element', '=', 'moyen')
            ->where('pages.nom_page', '=', $this->page)
            ->get();
        return view('pages/club/structure')->with(['header'=>$this->header, 'moyens'=> $moyens]);
    }

    public function equipe(){
        $equipe = Page::join('elements', 'pages.id', '=', 'elements.id_page')
            ->join('contenu_elements', 'elements.id', '=', 'contenu_elements.id_element')
            ->join('images', 'contenu_elements.id_image', '=', 'images.id')
            ->where('elements.nom_element', '=', 'equipe')
            ->where('pages.nom_page', '=', $this->page)
            ->get();

        return view('pages/club/equipe')->with(['header'=>$this->header, 'equipes'=>$equipe]);
    }

    public function cavalerie(){
        $cavalerie = Page::join('elements', 'pages.id', '=', 'elements.id_page')
            ->join('contenu_elements', 'elements.id', '=', 'contenu_elements.id_element')
            ->join('images', 'contenu_elements.id_image', '=', 'images.id')
            ->where('elements.nom_element', '=', 'cavalerie')
            ->where('pages.nom_page', '=', $this->page)
            ->get();
        return view('pages/club/cavalerie')->with(['header'=>$this->header, 'cavalerie'=>$cavalerie]);

    }

    public function activite(){
        $activite = Page::join('elements', 'pages.id', '=', 'elements.id_page')
            ->join('contenu_elements', 'elements.id', '=', 'contenu_elements.id_element')
            ->join('images', 'contenu_elements.id_image', '=', 'images.id')
            ->where('elements.nom_element', '=', 'activite')
            ->where('pages.nom_page', '=', $this->page)
            ->get();
        return view('pages/activite')->with(['header'=>$this->header, 'activites'=>$activite]);
    }
}
