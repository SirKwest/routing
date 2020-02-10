<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;


class LuckyController extends AbstractController
{
    public function fake()
    {
        $number = random_int(0, 100);

        return $this->render('lucky/number.html.twig', [
            'number' => $number * 200,
        ]);
    }

    /**
     * @Route("/product/{product_id}", name="app_static_routed_path")
     */
    public function number($product_id = 0)
    {
        $number = $product_id;

        return new Response(
            '<html><body>Totally random number: ' . $number . '</body></html>'
        );

    }

    /**
     * @Route("/intro")
     */
    public function list(Request $request)
    {
        /*$signUpPage = $this->generateUrl('app_lucky_fake');

        $userProfilePage = $this->generateUrl('app_lucky_fake', [
            'username' => 'name',
        ]);

        $signUpPage = $this->generateUrl('app_lucky_fake', [], UrlGeneratorInterface::ABSOLUTE_PATH);*/

        //$signUpPageInDutch = $this->generateUrl('app_static_routed_path');
        $allAttributes = $request->query->all();

        return $this->redirect($this->generateUrl('app_static_routed_path', $allAttributes));

        //return $this->redirectToRoute('app_static_routed_path');

        /*return $this->render('lucky/number.html.twig', [
            'number' => $number,
        ]);*/
    }
}