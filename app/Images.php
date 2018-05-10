<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    public function saveImage($nom, $format, $lien){
        $this->lien_image=$lien;
        $this->nom_image = $nom;
        $this->format = $format;
        $this->save();
        return $this->id;
    }
}
