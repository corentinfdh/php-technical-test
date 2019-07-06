<?php

namespace App\Controller;

use App\Entity\RunningOuting;
use App\Form\RunningOutingType;
use App\Repository\RunningOutingRepository;
use App\RunningOutingManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 * Class RunningOutingController
 * @package App\Controller
 */
class RunningOutingController extends AbstractController
{
    public function list(
        RunningOutingRepository $runningOutingRepository
    ) : Response {
        return $this->render('app/runningouting/list.html.twig', [
            'runningOutings' => $runningOutingRepository->findBy(['user' => $this->getUser()->getId()])
        ]);
    }

    public function create(
        Request $request,
        RunningOutingManager $runningOutingManager
    ) : Response
    {
        $runningOuting = new RunningOuting();

        $form = $this->createForm(RunningOutingType::class, $runningOuting);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var RunningOuting $runningOuting */
            $runningOuting = $form->getData();

            $runningOuting->setUser($this->getUser());
            $runningOuting->setAverageSpeed($runningOutingManager->calculateAverageSpeed($runningOuting));
            $runningOuting->setAveragePace($runningOutingManager->calculateAveragePace($runningOuting));

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($runningOuting);
            $entityManager->flush();

            $this->addFlash('success', 'Running outing created!');

            return $this->redirectToRoute('app_home');
        }

        return $this->render('app/runningouting/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function update(
        Request $request,
        RunningOuting $runningOuting,
        RunningOutingManager $runningOutingManager
    ): Response
    {
        if($this->getUser() != $runningOuting->getUser()) {
            throw new AccessDeniedException('Access Denied.');
        }

        $form = $this->createForm(RunningOutingType::class, $runningOuting);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $runningOuting->setAverageSpeed($runningOutingManager->calculateAverageSpeed($runningOuting));
            $runningOuting->setAveragePace($runningOutingManager->calculateAveragePace($runningOuting));

            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'Running outing updated!');

            return $this->redirectToRoute('app_home');
        }

        return $this->render('app/runningouting/create.html.twig', [
            'runningOuting' => $runningOuting,
            'form' => $form->createView(),
        ]);
    }

    public function delete(RunningOuting $runningOuting): Response
    {
        if($this->getUser() != $runningOuting->getUser()) {
            throw new AccessDeniedException('Access Denied.');
        }

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($runningOuting);
        $entityManager->flush();

        $this->addFlash('success', 'Running outing deleted!');

        return $this->redirectToRoute('app_home');
    }

}