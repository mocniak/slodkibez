<?php

namespace CakeBundle\Controller;

use CakeBundle\Entity\Order;
use CakeBundle\Form\Type\OrderType;
use Doctrine\ORM\EntityNotFoundException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        return $this->render('CakeBundle::base.html.twig');
    }
    /**
     * @Route("/create_cake", name="create_cake")
     */
    public function creatorAction(Request $request)
    {
        $order = new Order();
        $form = $this->createForm(OrderType::class,$order);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $cake = $order->getCake();
            $cake->setName($cake->getSpongeType(). ', '.$cake->getSoak(). ', '. $cake->getFrosting());
            $order->setName($cake->getName());
            $cake->setOfficial(false);

            $em = $this->getDoctrine()->getManager();
            $em->persist($order);
            $em->flush();

            return $this->redirectToRoute('order_cake', ['cakeOrderItemId' => $order->getId()]);
        }
        return $this->render('CakeBundle::create_cake.html.twig', ['form' => $form->createView()]);
    }
    
//    /**
//     * @Route("/order_cake/{cakeOrderItemId}", name="order_cake")
//     */
//    public function orderCakeAction($cakeOrderItemId)
//    {
//        $repository = $this->getDoctrine()
//            ->getRepository('CakeBundle:CakeOrderItem');
//        /** @var CakeOrderItem $cake */
//        $cakeOrderItem = $repository->find($cakeOrderItemId);
//        if (!$cakeOrderItem) throw new EntityNotFoundException();
//        $order = new Order();
//        $form = $this->createForm(OrderType::class, $order);
//        if ($form->isSubmitted() && $form->isValid()) {}
//        return $this->render('CakeBundle::order_cake.html.twig', ['form' => $form->createView(), 'cakeOrderItem' => $cakeOrderItem]);
//    }


        /**
     * @Route("/cakes", name="cakes")
     */
    public function cakesAction(Request $request)
    {
        $repository = $this->getDoctrine()
            ->getRepository('CakeBundle:Cake');
        $cakes = $repository->findAll();

        return $this->render('CakeBundle::cakes.html.twig', [
            'cakes' => $cakes]);
    }
}
