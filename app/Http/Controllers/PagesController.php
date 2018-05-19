<?php

namespace App\Http\Controllers;

use App\Contenu_elements;
use App\Page;
use App\Element;
use App\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class PagesController extends Controller
{
    private $header;
    private $page;
    private $user;
    private $pages;

    public function addPage(Request $request){
        $this->user= Auth::user();
        if(!$this->user->hasRole('Administrateur')){
            return 1; //message erreur à insérer
        }
        $aRemplacer = array('/', '\'', '"', '?', '!', ',', '^', '¨', ' '); // etc... tu met ici tout ce que tu veux remplacer
        $nom_page = str_replace(' ', '_', trim(str_replace($aRemplacer, '', $request->titrePage))); // Si la chaine se fini pour exemple par "chaine ?!!", il faut virer l'espace avec trim() une fois les autres caractères emplacés, sinon on se retrouve avec un "-" en fin de chaine "...chaine-"
        $Page = new Page;
        $Page->nom_page ='page/'.$nom_page;
        $Page->save();
        $ElementHeaderPage = new Element();
        $ElementHeaderPage->id_page = $Page->id;
        $ElementHeaderPage->nom_element = 'header';
        $ElementHeaderPage->save();

        $HeaderPage = new Contenu_elements();
        $HeaderPage->id_element = $ElementHeaderPage->id_element;
        $HeaderPage->titre_element = $request->titrePage;
        $HeaderPage->contenu_element = $request->entete;
        if ($request->hasFile('photo_entete')) {
            if($request->file('photo_entete')->isValid()){
                $path = $request->photo_entete->storeAs('/images/elements', $request->photo_entete->getClientOriginalName());
                $extension = $request->photo_entete->extension();
                $image = new Images();
                $imageid = $image->saveImage($request->photo_entete->getClientOriginalName(), $extension, $path);
                $HeaderPage->id_image = $imageid;
            }
        }
        $HeaderPage->save();

        $ElementContenuPage = new Element();
        $ElementContenuPage->id_page = $Page->id;
        $ElementContenuPage->nom_element = 'contenu';
        $ElementContenuPage->save();

        $ContenuPage = new Contenu_elements();
        $ContenuPage->titre_element = $request->titrePage;
        $ContenuPage->id_element = $ElementContenuPage->id_element;
        $ContenuPage->contenu_element = $request->contenuPage;
        $ContenuPage->save();

        return back();

    }

    public function getPage($page=null){
        $this->user= Auth::user();
        $this->page=Route::getFacadeRoot()->current()->uri();
        if(isset($page) && $page!=null){
            $this->page = 'page/'.$page;
        }
        if(Page::where('nom_page', '=', $this->page)->first()){
            if($this->user!=null && $this->user->hasRole('Administrateur')){
                $this->pages = Page::get();
            }
            $this->pages = Page::get();
            $this->header = Page::join('elements', 'pages.id', '=', 'elements.id_page')
                ->join('contenu_elements', 'elements.id_element', '=', 'contenu_elements.id_element')
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
                case 'contact':
                    return $this->contact();
                    break;
                case 'inscriptions_tarifs':
                    return $this->inscriptions_tarifs();
                    break;
                default:
                    return $this->autres();
                    break;
            }
        }else{
            return view('errors.404');
        }
    }

    public function autres(){
        $contenu= Page::join('elements', 'pages.id', '=', 'elements.id_page')
            ->join('contenu_elements', 'elements.id_element', '=', 'contenu_elements.id_element')
            ->leftJoin('images', 'contenu_elements.id_image', '=', 'images.id')
            ->where('elements.nom_element', '=', 'contenu')
            ->where('pages.nom_page', '=', $this->page)
            ->first();
        return view('pages/autres')->with(['header'=>$this->header, 'contenu'=>$contenu, 'pages'=>$this->pages]);
    }

    public function structure(){
        $moyens = Page::join('elements', 'pages.id', '=', 'elements.id_page')
            ->join('contenu_elements', 'elements.id_element', '=', 'contenu_elements.id_element')
            ->join('images', 'contenu_elements.id_image', '=', 'images.id')
            ->where('elements.nom_element', '=', 'moyen')
            ->where('pages.nom_page', '=', $this->page)
            ->get();
        return view('pages/club/structure')->with(['header'=>$this->header, 'moyens'=> $moyens, 'pages'=>$this->pages]);
    }

    public function equipe(){
        $equipe = Page::join('elements', 'pages.id', '=', 'elements.id_page')
            ->join('contenu_elements', 'elements.id_element', '=', 'contenu_elements.id_element')
            ->join('images', 'contenu_elements.id_image', '=', 'images.id')
            ->where('elements.nom_element', '=', 'equipe')
            ->where('pages.nom_page', '=', $this->page)
            ->get();

        return view('pages/club/equipe')->with(['header'=>$this->header, 'equipes'=>$equipe, 'pages'=>$this->pages]);
    }

    public function cavalerie(){
        $chevaux = Page::join('elements', 'pages.id', '=', 'elements.id_page')
            ->join('contenu_elements', 'elements.id_element', '=', 'contenu_elements.id_element')
            ->join('images', 'contenu_elements.id_image', '=', 'images.id')
            ->where('elements.nom_element', '=', 'chevaux')
            ->where('pages.nom_page', '=', $this->page)
            ->get();
        $poneys = Page::join('elements', 'pages.id', '=', 'elements.id_page')
            ->join('contenu_elements', 'elements.id_element', '=', 'contenu_elements.id_element')
            ->join('images', 'contenu_elements.id_image', '=', 'images.id')
            ->where('elements.nom_element', '=', 'poneys')
            ->where('pages.nom_page', '=', $this->page)
            ->get();
        $Demi_Pensions = Page::join('elements', 'pages.id', '=', 'elements.id_page')
            ->join('contenu_elements', 'elements.id_element', '=', 'contenu_elements.id_element')
            ->join('images', 'contenu_elements.id_image', '=', 'images.id')
            ->where('elements.nom_element', '=', 'demi_Pensions')
            ->where('pages.nom_page', '=', $this->page)
            ->get();
//        dd($Demi_Pensions);

        return view('pages/club/cavalerie')->with(['header'=>$this->header, 'chevaux'=>$chevaux, 'poneys'=>$poneys, 'Demi_Pensions'=>$Demi_Pensions, 'pages'=>$this->pages]);

    }

    public function activite(){
        $activite = Page::join('elements', 'pages.id', '=', 'elements.id_page')
            ->join('contenu_elements', 'elements.id_element', '=', 'contenu_elements.id_element')
            ->join('images', 'contenu_elements.id_image', '=', 'images.id')
            ->where('elements.nom_element', '=', 'activite')
            ->where('pages.nom_page', '=', $this->page)
            ->get();
        return view('pages/activite')->with(['header'=>$this->header, 'activites'=>$activite, 'pages'=>$this->pages]);
    }

    public function contact(){
        $contact = Page::join('elements', 'pages.id', '=', 'elements.id_page')
            ->join('contenu_elements', 'elements.id_element', '=', 'contenu_elements.id_element')
            ->join('images', 'contenu_elements.id_image', '=', 'images.id')
            ->where('elements.nom_element', '=', 'contact')
            ->where('pages.nom_page', '=', $this->page)
            ->get();
        return view('pages/contact')->with(['header'=>$this->header, 'contacts'=>$contact, 'pages'=>$this->pages]);

    }

    public function inscriptions_tarifs(){
        $tarifs = Page::join('elements', 'pages.id', '=', 'elements.id_page')
            ->join('contenu_elements', 'elements.id_element', '=', 'contenu_elements.id_element')
            ->join('images', 'contenu_elements.id_image', '=', 'images.id')
            ->where('elements.nom_element', '=', 'inscriptions_tarifs')
            ->where('pages.nom_page', '=', $this->page)
            ->get();
        return view('pages/tarifs')->with(['header'=>$this->header, 'itarifs'=>$tarifs, 'pages'=>$this->pages]);
    }
}
