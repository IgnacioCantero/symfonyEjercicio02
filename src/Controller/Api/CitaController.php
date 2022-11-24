<?php

namespace App\Controller\Api;

use App\Entity\Citas;
use App\Form\CitaType;
use App\Repository\CitasRepository;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Rest\Route("/cita")
 */
class CitaController extends AbstractFOSRestController
{
    //CRUD -> Create(1), Read(2), Update(3), Delete(4)

    private $repo;

    public function __construct(CitasRepository $repo){
        $this->repo = $repo;
    }

    #1
    /**
     * @Rest\Post(path="")
     * @Rest\View(serializerGroups={"cita"}, serializerEnableMaxDepthChecks=true)
     */
    public function createCitaAction(Request $request){
        $cita = new Citas();
        $form = $this->createForm(CitaType::class, $cita);
        $form->handleRequest($request);
        if (!$form->isSubmitted() || !$form->isValid()){
            return $form;
        }
        $this->repo->add($form->getData(),true);
        return $cita;
    }
}
