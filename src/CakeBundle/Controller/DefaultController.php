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
        $order->setOrderDate(new \DateTime());
        $order->setDeliveryDate(new \DateTime("+2 days"));
        $order->setPortions(8);
        $order->setNumberOfFloors(1);
        $form = $this->createForm(OrderType::class,$order);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $cake = $order->getCake();
            $cake->setName($cake->getSpongeType(). ', '.$cake->getSoak(). ', '. $cake->getFrosting());
            $cake->setOfficial(false);
            $order->setOrderDate(new \DateTime());
            $em = $this->getDoctrine()->getManager();
            $em->persist($order);
            $em->flush();

            return $this->redirectToRoute('order_confirm', ['orderId' => $order->getId()]);
        }
        return $this->render('CakeBundle::create_cake.html.twig', ['form' => $form->createView()]);
    }
    
    /**
     * @Route("/order_confirm/{orderId}", name="order_confirm")
     */
    public function orderCakeAction($orderId)
    {
        $repository = $this->getDoctrine()
            ->getRepository('CakeBundle:Order');
        /** @var Order $cake */
        $order = $repository->find($orderId);
        if (!$order) throw new EntityNotFoundException();

        return $this->render('CakeBundle::order_confirm.html.twig', ['order' => $order]);
    }


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
