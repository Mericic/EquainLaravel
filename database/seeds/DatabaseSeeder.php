<?php

use App\Contenu_elements;
use App\Element;
use App\Page;
use App\Images;
use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Administrateur']);
        Role::create(['name' => 'Utilisateur']);

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.fr',
            'password' => bcrypt('admin'),

        ]);
        $admin->assignRole('Administrateur');

        $user = User::create([
            'name' => 'User',
            'email' => 'user@user.fr',
            'password' => bcrypt('user'),
        ]);
        $user->assignRole('Utilisateur');


        //ACCUEIL -------------------------------------------------------------
        $page= new Page; $page->nom_page = 'accueil'; $page->save();
            $element = new Element;
                $element->nom_element = 'header';
                $element->id_page = $page->id;
                $element->save();
                    $contenu_elements = new Contenu_elements;
                    $contenu_elements -> id_element = $element->id_element;
                    $contenu_elements -> contenu_element = '<p><strong>La passion du cheval</strong><br>Un instructeur formé au Cadre Noir de Saumur<br>Une équipe de 6 moniteurs diplômés et 2 élèves monitrices<br>Une grande exigence et une cavalerie adaptée pour satisfaire tous les cavaliers</p>';
                    $contenu_elements -> titre_element = 'Un centre Equestre<br>aux portes de Lyon';
                        $image = new Images;
                        $image->lien_image = '/images/headers/cheval.mp4';
                        $image->nom_image = 'cheval.mp4';
                        $image->format = 'video/mp4';
                        $image->save();
                    $contenu_elements -> id_image = $image->id;
                    $contenu_elements ->save();
            $element = new Element;
                $element->nom_element = 'petit';
                $element->id_page = $page->id;
                $element->save();
                    $contenu_elements = new Contenu_elements;
                    $contenu_elements -> id_element = $element->id_element;
                    $contenu_elements -> contenu_element = '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis varius ipsum a enim pulvinar, eu maximus turpis convallis.</p>';
                    $contenu_elements -> titre_element = 'Ecole d\'equitation';
                        $image = new Images;
                        $image->lien_image = '/images/elements/ecoleEquitation.PNG';
                        $image->nom_image = 'ecoleEquitation.mp4';
                        $image->format = 'PNG';
                        $image->save();
                    $contenu_elements -> id_image = $image->id;
                    $contenu_elements ->save();

                    $contenu_elements = new Contenu_elements;
                    $contenu_elements -> id_element = $element->id_element;
                    $contenu_elements -> contenu_element = '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis varius ipsum a enim pulvinar, eu maximus turpis convallis.</p>';
                    $contenu_elements -> titre_element = 'Le centre équestre';
                        $image = new Images;
                        $image->lien_image = '/images/elements/horseball.PNG';
        $image->nom_image = 'horseball';

        $image->format = 'PNG';
                        $image->save();
                    $contenu_elements -> id_image = $image->id;
                    $contenu_elements ->save();

                    $contenu_elements = new Contenu_elements;
                    $contenu_elements -> id_element = $element->id_element;
                    $contenu_elements -> contenu_element = '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis varius ipsum a enim pulvinar, eu maximus turpis convallis.</p>';
                    $contenu_elements -> titre_element = 'Les activités';
                        $image = new Images;
                        $image->lien_image = '/images/elements/activites.PNG';
        $image->nom_image = 'activites';

        $image->format = 'PNG';
                        $image->save();
                    $contenu_elements -> id_image = $image->id;
                    $contenu_elements ->save();

        //STRUCTURE -------------------------------------------------------------

        $page= new Page; $page->nom_page = 'structure'; $page->save();
            $element = new Element;
            $element->nom_element = 'header';
            $element->id_page = $page->id;
            $element->save();
                $contenu_elements = new Contenu_elements;
                $contenu_elements -> id_element = $element->id_element;
                $contenu_elements -> contenu_element = '<p><strong>Une structure complète</strong><br>Un manège olympique, une carrière d\'honneur, une carrière CSO, un cross, ...</p>';
                $contenu_elements -> titre_element = 'Structure';
                    $image = new Images;
                    $image->lien_image = '/images/headers/carriere.PNG';
        $image->nom_image = 'carriere';

        $image->format = 'PNG';
                    $image->save();
                $contenu_elements -> id_image = $image->id;
                $contenu_elements ->save();

        $element = new Element;
        $element->nom_element = 'moyen';
        $element->id_page = $page->id;
        $element->save();
                $contenu_elements = new Contenu_elements;
                $contenu_elements -> id_element = $element->id_element;
                $contenu_elements -> contenu_element = '<p>Une carrière d\'honneur, une carrière CSO, un manège Olympique</p>';
                $contenu_elements -> titre_element = 'Carrières';
                $image = new Images;
                $image->lien_image = '/images/headers/carriere.PNG';
        $image->nom_image = 'carriere';

        $image->format = 'PNG';
                $image->save();
                $contenu_elements -> id_image = $image->id;
                $contenu_elements ->save();

                $contenu_elements = new Contenu_elements;
                $contenu_elements -> id_element = $element->id_element;
                $contenu_elements -> contenu_element = '';
                $contenu_elements -> titre_element = 'Manège';
                $image = new Images;
                $image->lien_image = '/images/elements/manege.jpg';
        $image->nom_image = 'manege';

        $image->format = 'jpg';
                $image->save();
                $contenu_elements -> id_image = $image->id;
                $contenu_elements ->save();

                $contenu_elements = new Contenu_elements;
                $contenu_elements -> id_element = $element->id_element;
                $contenu_elements -> contenu_element = '<p>Un Cross de 150 héctares</p>';
                $contenu_elements -> titre_element = 'Cross';
                $image = new Images;
                $image->lien_image = '/images/elements/cross.jpg';
        $image->nom_image = 'cross';

        $image->format = 'jpg';
                $image->save();
                $contenu_elements -> id_image = $image->id;
                $contenu_elements ->save();

                $contenu_elements = new Contenu_elements;
                $contenu_elements -> id_element = $element->id_element;
                $contenu_elements -> contenu_element = '<p>Plusieurs Paddocks à disposition de vos chevaux</p>';
                $contenu_elements -> titre_element = 'Paddock';
                $image = new Images;
                $image->lien_image = '/images/elements/paddock.PNG';
        $image->nom_image = 'paddock';

        $image->format = 'PNG';
                $image->save();
                $contenu_elements -> id_image = $image->id;
                $contenu_elements ->save();

        //EQUIPE -------------------------------------------------------------

        $page= new Page; $page->nom_page = 'equipe'; $page->save();
            $element = new Element;
            $element->nom_element = 'header';
            $element->id_page = $page->id;
            $element->save();
                $contenu_elements = new Contenu_elements;
                $contenu_elements -> id_element = $element->id_element;
                $contenu_elements -> contenu_element = '<p>Une équipe de 6 moniteurs diplômés et 2 élèves monitrices</p>';
                $contenu_elements -> titre_element = 'Equipe';
                    $image = new Images;
                    $image->lien_image = '/images/headers/equipe.jpg';
                    $image->format = 'jpg';
        $image->nom_image = 'equipe';

        $image->save();
                $contenu_elements -> id_image = $image->id;
                $contenu_elements ->save();

            $element = new Element;
            $element->nom_element = 'equipe';
            $element->id_page = $page->id;
            $element->save();
                $contenu_elements = new Contenu_elements;
                $contenu_elements -> id_element = $element->id_element;
                $contenu_elements -> contenu_element = '<p>Instructeur</p>';
                $contenu_elements -> titre_element = 'Sebastien';
                $image = new Images;
                $image->lien_image = '/images/elements/equipe/sebastien.png';
                $image->format = 'png';
        $image->nom_image = 'sebastien';

        $image->save();
                $contenu_elements -> id_image = $image->id;
                $contenu_elements ->save();

                $contenu_elements = new Contenu_elements;
                $contenu_elements -> id_element = $element->id_element;
                $contenu_elements -> contenu_element = '<p>Bureau</p>';
                $contenu_elements -> titre_element = 'Christiane';
                $image = new Images;
                $image->lien_image = '/images/elements/equipe/christiane.png';
                $image->format = 'png';
        $image->nom_image = 'christiane';

        $image->save();
                $contenu_elements -> id_image = $image->id;
                $contenu_elements ->save();

                $contenu_elements = new Contenu_elements;
                $contenu_elements -> id_element = $element->id_element;
                $contenu_elements -> contenu_element = '<p>Bureau</p>';
                $contenu_elements -> titre_element = 'Henri';
                $image = new Images;
                $image->lien_image = '/images/elements/equipe/henri.png';
                $image->format = 'png';
                $image->nom_image = 'henri';
                $image->save();
                $contenu_elements -> id_image = $image->id;
                $contenu_elements ->save();

                $contenu_elements = new Contenu_elements;
                $contenu_elements -> id_element = $element->id_element;
                $contenu_elements -> contenu_element = '<p>Moniteur</p>';
                $contenu_elements -> titre_element = 'Morgan';
                $image = new Images;
                $image->lien_image = '/images/elements/equipe/morgan.png';
                $image->format = 'png';
                $image->nom_image = 'morgan';
                $image->save();
                $contenu_elements -> id_image = $image->id;
                $contenu_elements ->save();

                $contenu_elements = new Contenu_elements;
                $contenu_elements -> id_element = $element->id_element;
                $contenu_elements -> contenu_element = '<p>Moniteur</p>';
                $contenu_elements -> titre_element = 'Dorine';
                $image = new Images;
                $image->lien_image = '/images/elements/equipe/dorine.png';
                $image->format = 'png';
                $image->nom_image = 'dorine';
                $image->save();
                $contenu_elements -> id_image = $image->id;
                $contenu_elements ->save();

                $contenu_elements = new Contenu_elements;
                $contenu_elements -> id_element = $element->id_element;
                $contenu_elements -> contenu_element = '<p>Moniteur</p>';
                $contenu_elements -> titre_element = 'amandine';
                $image = new Images;
                $image->lien_image = '/images/elements/equipe/amandine.png';
                $image->format = 'png';
                $image->nom_image = 'amandine';
                $image->save();
                $contenu_elements -> id_image = $image->id;
                $contenu_elements ->save();

                $contenu_elements = new Contenu_elements;
                $contenu_elements -> id_element = $element->id_element;
                $contenu_elements -> contenu_element = '<p>Moniteur</p>';
                $contenu_elements -> titre_element = 'frederic';
                $image = new Images;
                $image->lien_image = '/images/elements/equipe/frederic.png';
                $image->format = 'png';
                $image->nom_image = 'frederic';
                $image->save();
                $contenu_elements -> id_image = $image->id;
                $contenu_elements ->save();

                $contenu_elements = new Contenu_elements;
                $contenu_elements -> id_element = $element->id_element;
                $contenu_elements -> contenu_element = '<p>Moniteur</p>';
                $contenu_elements -> titre_element = 'Céline';
                $image = new Images;
                $image->lien_image = '/images/elements/equipe/celine.png';
                $image->format = 'png';
                $image->nom_image = 'celine';
                $image->save();
                $contenu_elements -> id_image = $image->id;
                $contenu_elements ->save();

                $contenu_elements = new Contenu_elements;
                $contenu_elements -> id_element = $element->id_element;
                $contenu_elements -> contenu_element = '<p>Monitrice ASUL / Université</p>';
                $contenu_elements -> titre_element = 'laurence';
                $image = new Images;
                $image->lien_image = '/images/elements/equipe/laurence.png';
                $image->format = 'png';
                $image->nom_image = 'laurence';
                $image->save();
                $contenu_elements -> id_image = $image->id;
                $contenu_elements ->save();

                $contenu_elements = new Contenu_elements;
                $contenu_elements -> id_element = $element->id_element;
                $contenu_elements -> contenu_element = '<p>Oxer</p>';
                $contenu_elements -> titre_element = 'Cyrielle';
                $image = new Images;
                $image->lien_image = '/images/elements/equipe/cyrielle.png';
                $image->format = 'png';
                $image->nom_image = 'cyrielle';
                $image->save();
                $contenu_elements -> id_image = $image->id;
                $contenu_elements ->save();

                $contenu_elements = new Contenu_elements;
                $contenu_elements -> id_element = $element->id_element;
                $contenu_elements -> contenu_element = '<p>Oxer</p>';
                $contenu_elements -> titre_element = 'Aurelie';
                $image = new Images;
                $image->lien_image = '/images/elements/equipe/aurelie.png';
                $image->format = 'png';
                $image->nom_image = 'aurelie';
                $image->save();
                $contenu_elements -> id_image = $image->id;
                $contenu_elements ->save();

                $contenu_elements = new Contenu_elements;
                $contenu_elements -> id_element = $element->id_element;
                $contenu_elements -> contenu_element = '<p>Ecuries - Maréchal Férand</p>';
                $contenu_elements -> titre_element = 'Christophe';
                $image = new Images;
                $image->lien_image = '/images/elements/equipe/christophe.png';
                $image->format = 'png';
                $image->nom_image = 'christophe';
                $image->save();
                $contenu_elements -> id_image = $image->id;
                $contenu_elements ->save();

        //CAVALERIE -------------------------------------------------------------

        $page= new Page; $page->nom_page = 'cavalerie'; $page->save();
            $element = new Element;
            $element->nom_element = 'header';
            $element->id_page = $page->id;
            $element->save();
                $contenu_elements = new Contenu_elements;
                $contenu_elements -> id_element = $element->id_element;
                $contenu_elements -> contenu_element = '<p>cavalerie adaptée pour satisfaire tous les cavaliers</p>';
                $contenu_elements -> titre_element = 'Cavalerie';
                    $image = new Images;
                    $image->lien_image = '/images/headers/cavalerie.jpg';
                    $image->format = 'jpg';
                $image->nom_image = 'cavalerie';
                    $image->save();
                $contenu_elements -> id_image = $image->id;
                $contenu_elements ->save();

                $element = new Element;
                $element->nom_element = 'cavalerie';
                $element->id_page = $page->id;
                $element->save();

        //ACTIVITES -------------------------------------------------------------
        $page= new Page; $page->nom_page = 'activite'; $page->save();
            $element = new Element;
            $element->nom_element = 'header';
            $element->id_page = $page->id;
            $element->save();
                $contenu_elements = new Contenu_elements;
                $contenu_elements -> id_element = $element->id_element;
                $contenu_elements -> contenu_element = '<strong>de 4 à 99 ans</strong><br><p>Vous aimez l\'équitation pour le loisir ou vous souhaitez une activité sportive ?</p><p>Nous vous proposons beaucoup d\'activités</p>';
                $contenu_elements -> titre_element = 'Des Activités pour tous à tous les âges';
                    $image = new Images;
                    $image->lien_image = '/images/headers/activites.PNG';
                    $image->format = 'PNG';
                $image->nom_image = 'activites';
                    $image->save();
                $contenu_elements -> id_image = $image->id;
                $contenu_elements ->save();

            $element = new Element;
            $element->nom_element = 'activite';
            $element->id_page = $page->id;
            $element->save();

                $contenu_elements = new Contenu_elements;
                $contenu_elements -> id_element = $element->id_element;
                $contenu_elements -> contenu_element = '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis varius ipsum a enim pulvinar, eu maximus turpis convallis.</p>';
                $contenu_elements -> titre_element = 'Poney Club';
                $contenu_elements -> lien_next = '/activites/poney_club';
                    $image = new Images;
                    $image->lien_image = '/images/elements/activites.PNG';
                    $image->format = 'PNG';
                $image->nom_image = 'activites';
                    $image->save();
                $contenu_elements -> id_image = $image->id;
                $contenu_elements ->save();


                $contenu_elements = new Contenu_elements;
                $contenu_elements -> id_element = $element->id_element;
                $contenu_elements -> contenu_element = '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis varius ipsum a enim pulvinar, eu maximus turpis convallis.</p>';
                $contenu_elements -> titre_element = 'Ecole d\equitation';
                $contenu_elements -> lien_next = '/activites/ecole_dequitation';
                $image = new Images;
                $image->lien_image = '/images/elements/activites.PNG';
                $image->format = 'PNG';
                $image->nom_image = 'activites';
                $image->save();
                $contenu_elements -> id_image = $image->id;
                $contenu_elements ->save();


                $contenu_elements = new Contenu_elements;
                $contenu_elements -> id_element = $element->id_element;
                $contenu_elements -> contenu_element = '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis varius ipsum a enim pulvinar, eu maximus turpis convallis.</p>';
                $contenu_elements -> titre_element = 'Equitation Sportive';
                $contenu_elements -> lien_next = '/activites/equitation_sportive';
                $image = new Images;
                $image->lien_image = '/images/elements/activites.PNG';
                $image->format = 'PNG';
                $image->nom_image = 'activites';
                $image->save();
                $contenu_elements -> id_image = $image->id;
                $contenu_elements ->save();


                $contenu_elements = new Contenu_elements;
                $contenu_elements -> id_element = $element->id_element;
                $contenu_elements -> contenu_element = '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis varius ipsum a enim pulvinar, eu maximus turpis convallis.</p>';
                $contenu_elements -> titre_element = 'Universitaires';
                $contenu_elements -> lien_next = '/activites/universitaires';
                $image = new Images;
                $image->lien_image = '/images/elements/activites.PNG';
                $image->format = 'PNG';
                $image->nom_image = 'activites';
                $image->save();
                $contenu_elements -> id_image = $image->id;
                $contenu_elements ->save();


                $contenu_elements = new Contenu_elements;
                $contenu_elements -> id_element = $element->id_element;
                $contenu_elements -> contenu_element = '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis varius ipsum a enim pulvinar, eu maximus turpis convallis.</p>';
                $contenu_elements -> titre_element = 'Handisport';
                $contenu_elements -> lien_next = '/activites/handisport';
                $image = new Images;
                $image->lien_image = '/images/elements/activites.PNG';
                $image->format = 'PNG';
                $image->nom_image = 'activites';
                $image->save();
                $contenu_elements -> id_image = $image->id;
                $contenu_elements ->save();


                $contenu_elements = new Contenu_elements;
                $contenu_elements -> id_element = $element->id_element;
                $contenu_elements -> contenu_element = '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis varius ipsum a enim pulvinar, eu maximus turpis convallis.</p>';
                $contenu_elements -> titre_element = 'Anniversaires - Balades';
                $contenu_elements -> lien_next = '/activites/anniversaires_balades';
                $image = new Images;
                $image->lien_image = '/images/elements/activites.PNG';
                $image->format = 'PNG';
                $image->nom_image = 'activites';
                $image->save();
                $contenu_elements -> id_image = $image->id;
                $contenu_elements ->save();



    }
}
