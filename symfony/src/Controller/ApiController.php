<?php

namespace App\Controller;

use App\Entity\ExitType;
use App\Entity\RunningOuting;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ApiController
 * @package App\Controller
 * @Rest\Route("/api")
 */
class ApiController extends AbstractFOSRestController
{
    /**
     * @Rest\Get("/list")
     *
     * @return Response
     */
    public function list()
    {
        $repository = $this->getDoctrine()->getRepository(RunningOuting::class);

        $runningOutings = $repository->findAll();

        return $this->handleView($this->view($runningOutings, Response::HTTP_OK));
    }

    /**
     * @Rest\Get("/list/user/{id}")
     *
     * @param int $id
     *
     * @return Response
     */
    public function listByUser(int $id)
    {
        $repository = $this->getDoctrine()->getRepository(RunningOuting::class);

        $runningOutings = $repository->findBy(['user' => $id]);

        return $this->handleView($this->view($runningOutings, Response::HTTP_OK));
    }

    /**
     * @Rest\Get("/get/runningOuting/{id}")
     *
     * @param int $id
     *
     * @return Response
     */
    public function getRunningOuting(int $id)
    {
        $repository = $this->getDoctrine()->getRepository(RunningOuting::class);

        $runningOutings = $repository->findBy(['id' => $id]);

        return $this->handleView($this->view($runningOutings, Response::HTTP_OK));
    }

    /**
     * @Rest\Get("/list/exitType/{id}")
     *
     * @param int $id
     *
     * @return Response
     */
    public function listByExitType(int $id)
    {
        $repository = $this->getDoctrine()->getRepository(RunningOuting::class);

        $runningOutings = $repository->findBy(['exitType' => $id]);

        return $this->handleView($this->view($runningOutings, Response::HTTP_OK));
    }

    /**
     * @Rest\Get("/list/exitType/{idExitType}/{idUser}")
     *
     * @param int $idExitType
     * @param int $idUser
     *
     * @return Response
     */
    public function listByExitTypeAndUser(int $idExitType, int $idUser)
    {
        $repository = $this->getDoctrine()->getRepository(RunningOuting::class);

        $runningOutings = $repository->findBy([
            'exitType' => $idExitType,
            'user' => $idUser
        ]);

        return $this->handleView($this->view($runningOutings, Response::HTTP_OK));
    }

    /**
     * @Rest\Get("/list/exitTypes")
     *
     * @return Response
     */
    public function listExitTypes()
    {
        $repository = $this->getDoctrine()->getRepository(ExitType::class);

        $exitTypes = $repository->findAll();

        return $this->handleView($this->view($exitTypes, Response::HTTP_OK));
    }
}