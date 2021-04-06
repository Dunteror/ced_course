ENTITÉ

installation composant doctrine :

composer require symfony/orm-pack

création db

vérif connection entre doctrine et bdd dans .env (racine)

comparatif entity et bdd (utilisé pr tester la connection) : php bin/console do:mi:di

installation de maker: composer require --dev symfony/maker-bundle

générer une entité : php bin/console make:entity

update une entité : php bin/console make:entity

Faire la liaison One to Many : php bin/console make:entity
création nouvel attribut avec type “relationship”

Vérifier si j’ai la migration de doctrine activé : composer require doctrine/doctrine-migrations-bundle "^3.0"

Comparatif entity et bdd (+ préparation requête création tout ca) : php bin/console do:mi:di

Migration des entités vers la bdd (exécuter la liste des requêtes SQL générées) : doctrine:migrations:migrate




CONTROLLERS

créer le fichier des contrôleurs + générer un controller : php bin/console make:controller

Utilisation du repo dans la fonction list : 
        $races = $this->getDoctrine()->getRepository(Race::class)->findByStrength(50);


Création du formulaire :
création du dossier form à la main
RaceType (builder de formulaire) : 
$form = $this->createForm(RaceType::class);

Transmission du formulaire à la vue : 
        return $this->render('newRace.html.twig', [
            'form' => $form->createView(),
        ]);


affichage du formulaire dans un twig: 
{{ form(form) }}

Enregistrement : 
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $race = $form->getData();
 
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($race);
            $entityManager->flush();
 
            return $this->redirectToRoute('race');
        }
