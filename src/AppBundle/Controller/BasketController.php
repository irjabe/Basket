<?php
namespace AppBundle\Controller;

use AppBundle\Form\BasketType;
use AppBundle\Service\CalculatorService;
use AppBundle\Entity\Basket;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BasketController extends Controller
{
    /**
     * @param Request $request
     * @param CalculatorService $service
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/", name="home")
     */
    public function indexAction(Request $request , CalculatorService $service)
    {
        $basket = new Basket();
        $form = $this->createForm(BasketType::class, $basket);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $tva = $this->getParameter('TVA');
            $products = $basket->getProducts();
            $totalBasket = 0;
            $totalBasketTaxed = 0;
            if(count($products) === 0) {
                $this->addFlash('notice', "ATTENTION : Vous devez d'abord entrer des produits avant de les enregistrer");
                return $this->redirectToRoute('home');
            } else {
                foreach ($products as $key => $product) {
                    $quantity = $product->getQuantity();
                    $price = $product->getPrice();
                    $totalProduct = $service->calculateTotalWithoutTax($price, $quantity);
                    $totalProductTaxed = $service->calculateTotalTaxed($price, $quantity, $tva);
                    $product->setTotal($totalProduct);
                    $product->setTotalTaxed($totalProductTaxed);
                    $totalBasket += $totalProduct;
                    $totalBasketTaxed += $totalProductTaxed;
                }

                return $this->render(':basket:show.html.twig', [
                    'basket'        => $basket,
                    'products'      => $products,
                    'tva'           => $tva,
                    'totalBasket'      => $totalBasket,
                    'totalBasketTaxed' => $totalBasketTaxed
                ]);
            }
        }

        return $this->render(':basket:new.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
