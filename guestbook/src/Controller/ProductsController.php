<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProductsController extends AbstractController
{


  #[Route('/products', name: 'app_products')]
  public function index(ProductRepository $productRepository): Response
  {
    return $this->render('products/index.html.twig', [
      'products' => $productRepository->findAll(),
    ]);
  }

  #[Route('/product/{id}', name: 'app_product')]
  public function one(Product $product): Response
  {
    return $this->render('products/show.html.twig', [
      'product' => $product,
    ]);
  }
}
