<?php

namespace CakeBundle\Controller;

use CakeBundle\Entity\Cake;
use CakeBundle\Entity\CakeOrderItem;
use CakeBundle\Entity\Order;
use CakeBundle\Form\Type\CakeOrderItemType;
use CakeBundle\Form\Type\CakeOrderType;
use CakeBundle\Form\Type\CakeType;
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
        $cakeOrderItem = new CakeOrderItem();
        $form = $this->createForm(CakeOrderItemType::class,$cakeOrderItem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $cake = $cakeOrderItem->getCake();
            $cake->setName($cake->getSpongeType(). ', '.$cake->getSoak(). ', '. $cake->getFrosting());
            $cakeOrderItem->setName($cake->getName());
            $cake->setOfficial(false);
//            $cake->setPricePerPortion(10);

            $em = $this->getDoctrine()->getManager();
            $em->persist($cakeOrderItem);
            $em->flush();

            return $this->redirectToRoute('order_cake', ['cakeOrderItemId' => $cakeOrderItem->getId()]);
        }
        return $this->render('CakeBundle::create_cake.html.twig', ['form' => $form->createView()]);
    }
    
    /**
     * @Route("/order_cake/{cakeOrderItemId}", name="order_cake")
     */
    public function orderCakeAction($cakeOrderItemId)
    {
        $repository = $this->getDoctrine()
            ->getRepository('CakeBundle:CakeOrderItem');
        /** @var CakeOrderItem $cake */
        $cakeOrderItem = $repository->find($cakeOrderItemId);
        if (!$cakeOrderItem) throw new EntityNotFoundException();
        $order = new Order();
        $form = $this->createForm(CakeOrderType::class, $order);
        return $this->render('CakeBundle::order_cake.html.twig', ['form' => $form->createView(), 'cakeOrderItem' => $cakeOrderItem]);
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
