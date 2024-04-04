<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\CustomerRepository;
use Knp\Component\Pager\PaginatorInterface;

class CustomerController extends AbstractController
{
    #[Route('/customer', name: 'customer.index')]
    public function index(CustomerRepository $repository, PaginatorInterface $paginator, Request $request): Response
    {
        $customers = $paginator->paginate(
            $repository->findAll(),
            $request->query->getInt('page', 1),
            10
        );
        return $this->render('customer/index.html.twig', [
            'customers' => $customers
        ]);
    }
    #[Route('/customer/nouveau', name: 'customer.new')]
    public function new( EntityManagerInterface $manager, Request $request): Response
    {
       $customer = new Customer();
       $form = $this->createForm(CustomerType::class, $customer);
       $form->handleRequest($request);

       if($form->isSubmitted() && $form->isValid())
       {
            $customer = $form->getData();

            $manager->persist($customer);
            $manager->flush();

            return $this->redirectToRoute('customer.index');
       }
        return $this->render('customer/new.html.twig', [
            'form' => $form->createView()
        ]);
}
}
