<?php

namespace App\Controller;

use App\Entity\Car;
use App\Form\CarType;

use App\Service\SendDataService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarController extends AbstractController
{
    /**
     * @var SendDataService
     */
    private $sendData;

    /**
     * CarController constructor.
     * @param SendDataService $sendData
     */
    public function __construct(SendDataService $sendData)
    {
        $this->sendData = $sendData;
    }

    /**
     * @Route("/", name="car", methods={"GET"})
     */
    public function index(): Response
    {
        $form = $this->createForm(CarType::class, new Car(), array(
            'attr'=> array(
                'class' => 'form-ajax'
            )
        ));

        return $this->render('car/index.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/send", methods={"POST"})
     * @param Request $request
     * @return Response
     */
    public function send(Request $request) : Response
    {
        $car = $request->request->get('car');
        $this->sendData->send($car);
        return new Response();
    }
}
