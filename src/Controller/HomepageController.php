<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class HomepageController extends AbstractController
{
    /**
     * @Route("/{_locale}", name="app_homepage", requirements={"_locale": "en|de|fr"})
     */
    public function index(Request $request, TranslatorInterface $translator): Response
    {
//        $translated = $translator->trans('Symfony is great');
//        $locale = $request->getLocale();

        $count = rand(1, 100);
        $name = sprintf('name_%d', $count);
        $translated = $translator->trans('Hello '.$name);

//        dd($translated);

        return $this->render('homepage/index.html.twig', [
            'translated' => $translated,
            'name' => $name,
            'count' => $count,
        ]);
    }
}
