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
     * @Route({
     *     "en": "/product/{product_name}",
     *     "nl": "/nlproduct/{product_name}"
*     }, name="app_static_routed_path")
     */
    public function number($product_id = 0, $product_name = '')
    {
        $number = $product_id;

        if (!empty($product_name)) {
            return new Response(
                '<html><body>Totally random number: ' . $number . '</body></html>'
            );
        } else {
            return $this->redirect($this->generateUrl('app_static_routed_path', ['product_name' => 'pants']));
        }
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