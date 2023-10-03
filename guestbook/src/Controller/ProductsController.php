<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ProductsController extends AbstractController
{

    
        #[Route('/products', name: 'app_products')]
        public function index(ProductRepository $productRepository): JsonResponse
        {
          return $this->render('product/index.html.twig', [
            'products' => $productRepository->findAll(),
          ]);
        }
    
        #[Route('/product/{id}', name: 'app_product')]
        public function one(int $id): JsonResponse
        {
            $productColection = new ArrayCollection($this->products);

            $product = $productColection->findFirst(fn(int $key, array $product) => $id === $product['id']);

            return new JsonResponse($product);
        }
}