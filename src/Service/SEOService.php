<?php

namespace App\Service;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class SEOService
{
    private $router;

    public function __construct(UrlGeneratorInterface $router)
    {
        $this->router = $router;
    }

    public function generate_seo_name()
    {
        $signUpPage = $this->generateUrl('sign_up');

        $userProfilePage = $this->generateUrl('user_profile', [
            'username' => 'name',
        ]);

        $signUpPage = $this->router->generate('sign_up', [], UrlGeneratorInterface::ABSOLUTE_PATH);

        $signUpPageInDutch = $this->router->generate('sign_up', ['_locale' => 'nl']);
    }
}
