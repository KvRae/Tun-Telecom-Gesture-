<?php

namespace App\Controller;

use App\Entity\Employees;
use App\Form\EmployeesType;
use App\service\PdfService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/employees")
 */
class EmployeesController extends AbstractController
{
    /**
     * @Route("/", name="app_employees_index", methods={"GET"})
     */
    public function index(EntityManagerInterface $entityManager): Response
    {
        $employees = $entityManager
            ->getRepository(Employees::class)
            ->findAll();

        return $this->render('employees/index.html.twig', [
            'employees' => $employees,
        ]);
    }

    /**
     * @Route("/new", name="app_employees_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $employee = new Employees();
        $form = $this->createForm(EmployeesType::class, $employee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($employee);
            $entityManager->flush();

            return $this->redirectToRoute('app_employees_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('employees/new.html.twig', [
            'employee' => $employee,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_employees_show", methods={"GET"})
     */
    public function show(Employees $employee): Response
    {
        return $this->render('employees/show.html.twig', [
            'employee' => $employee,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_employees_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Employees $employee, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EmployeesType::class, $employee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_employees_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('employees/edit.html.twig', [
            'employee' => $employee,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/pdf/{id}", name="fichier_pdf")
     * @param Employees $employee
     */
    public function generatePdf( PdfService $pdf, Employees $employee){
        $matricule =(string) $employee->getMatricule();
        $mat=[];
        for ($i=0; $i<strlen($matricule); $i++)
            $mat[$i]= substr($matricule,$i,1);
        $html = $this->render('employees/avTravaux.html.twig',['employee'=> $employee,'matricule'=>$mat]);
        $pdf->showPdfFile($html);
    }

    /**
     * @Route("/{id}", name="app_employees_delete", methods={"POST"})
     */
    public function delete(Request $request, Employees $employee, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$employee->getId(), $request->request->get('_token'))) {
            $entityManager->remove($employee);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_employees_index', [], Response::HTTP_SEE_OTHER);
    }





}
