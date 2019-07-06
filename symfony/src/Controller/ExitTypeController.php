<?php

namespace App\Controller;

use App\Entity\ExitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ExitTypeController
 * @package App\Controller
 */
class ExitTypeController extends AbstractController
{
    public function create(
        Request $request
    ) : Response {
        $exitType = new ExitType();

        $form = $this->createFormBuilder($exitType)
            ->add('type', TextType::class, ['required' => true])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $exitType = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($exitType);
            $entityManager->flush();

            $this->addFlash('success', 'Exit type created!');

            return $this->redirectToRoute('app_home');
        }

        return $this->render('app/exittype/create.html.twig', [
            'form' => $form->createView()
        ]);
    }
}