<?php

namespace CakeBundle\Controller;

use CakeBundle\Entity\Cake;
use CakeBundle\Form\Type\CakeType;
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
     * @Route("/creator", name="cake_creator")
     */
    public function creatorAction(Request $request)
    {
        $cake = new Cake();
        $form = $this->createForm(CakeType::class,$cake);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $cake->setName('cake to order');
            $cake->setOfficial(false);
            $cake->setPricePerPortion(10);

            $em = $this->getDoctrine()->getManager();
            $em->persist($cake);
            $em->flush();

            return $this->redirectToRoute('order_cake',['cakeId'=>$cake->getId()]);
        }
        return $this->render('CakeBundle::creator.html.twig', ['form' => $form->createView()]);
    }
    /**
     * @Route("/order_cake/{cakeId}", name="order_cake")
     */
    public function orderCakeAction($cakeId) {
        $repository = $this->getDoctrine()
            ->getRepository('CakeBundle:Cake');
        $cake = $repository->findOneBy(['id'=>$cakeId]);
        return $this->render('CakeBundle::order_cake.html.twig', ['cake' => $cake]);
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
