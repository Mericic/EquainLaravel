<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $header = Page::join('elements', 'pages.id', '=', 'elements.id_page')
            ->join('contenu_elements', 'elements.id', '=', 'contenu_elements.id_element')
            ->join('images', 'contenu_elements.id_image', '=', 'images.id')
            ->where('elements.nom_element', '=', 'header')
            ->where('pages.nom_page', '=', 'accueil')
            ->first();
        $petits = Page::join('elements', 'pages.id', '=', 'elements.id_page')
            ->join('contenu_elements', 'elements.id', '=', 'contenu_elements.id_element')
            ->join('images', 'contenu_elements.id_image', '=', 'images.id')
            ->where('elements.nom_element', '=', 'petit')
            ->where('pages.nom_page', '=', 'accueil')
            ->get();
        return view('pages/accueil')->with(['petits'=>$petits, 'header'=>$header]);
    }


}
