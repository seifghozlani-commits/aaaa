<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
Use App\Entity\Job;
use App\Entity\Image;    
use Doctrine\ORM\EntityManagerInterface;
final class JobController extends AbstractController
{
    #[Route('/job/create-demo', name: 'app_job_demo_create')]
    public function demo(EntityManagerInterface $em): Response
    {
        $job=new Job();
        $job->setType('CDI');
        $job->setCompany('PolyTechnique');
        $job->setDescription('Ingenieur DS');
        $job->setEmail('contact@gmail.com');
        $job->setExpiresAt(new \DateTimeImmutable('+45 days'));

        $img = new Image();
        $img->setUrl('https://static.wikia.nocookie.net/cartoonnetwork/images/b/b5/SeriesTitle-TomandJerry.png/revision/latest?cb=20260603032442');
        $img->setAlt('job de reve !!');
        $job->setImage($img);

        $em->persist($job);
        $em->flush();

        return $this->render('job/create_demo.html.twig',["id"=>$job->getId()]);
    }

    #[Route('/job/(id)', name: 'job_info')]
    public function show(EntityManagerInterface $em,int $id){
        $job= $em->getRepository(Job::class)->find($id);
        
        return $this->render('job/show.html.twig',["job"=>$job]);
    }
    
    #[Route('/job', name: 'job_all')]
    public function index(EntityManagerInterface $em){
        $job= $em->getRepository(Job::class)->findAll();
        return $this->render('job/index.html.twig',["jobs"=>$job]);
    }

}
