<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class InscriptionController extends AbstractController
{
    #[Route('/inscription', name: 'test_inscription')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/InscriptionController.php',
        ]);
    }
    #[Route('/inscription/html', name: 'test_html')]
    public function testhtml(): Response
    {
        return new Response(
            "<html><body>My first page</body></html>"
        );
    }
    
    #[Route('/voir/{code}', name: 'voir',requirements:['code'=>'\d+'])]
    public function voir(int $code): Response
    {
        $n=random_int(0,100);
        $dateDuJour= new \DateTimeImmutable('now');
        $nomPage="Acceuil";
        $estOuvert=true;


        return $this->render(
            'inscription/number.html.twig',
            ["nombre"=>$n , 'dateDuJour'=>$dateDuJour,
            'nomPage'=>$nomPage,
            'estOuvert'=>$estOuvert]
            );
    }

    #[Route('/indicateur',name:'indicateur')]
    public function indicateur():Response{
        $indicateurs=[
            ['libelle'=>'Taux de reussite','valeur'=>87.4567,'unite'=>'%'],
            ['libelle'=>'Nombre d\'étudiant','valeur'=>1245,'unite'=>''],
            ['libelle'=>'Budget consommé','valeur'=>153230.5,'unite'=>'TD']
        ];

        return $this->render(
            'inscription/indicateur.html.twig',
            ['indicateurs'=>$indicateurs]
        );

    }
    #[Route('/Accueil', name: 'page_accueil')]
     public function welcome(): Response
    {
        $n=random_int(0,100);
        return $this->render(
            'inscription/accueil.html.twig',
            ["nombre"=>$n]
            );
    }
    #[Route('/Contact', name: 'page_contact')]
public function contact(): Response
{
    return $this->render('inscription/contact.html.twig');
}

}
