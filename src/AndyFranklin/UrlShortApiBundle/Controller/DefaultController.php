<?php

namespace AndyFranklin\UrlShortApiBundle\Controller;

use AndyFranklin\UrlShortApiBundle\Entity\Url;
use AndyFranklin\UrlShortApiBundle\Form\UrlType;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Cache\Simple\FilesystemCache;

class DefaultController extends FOSRestController
{
    public function indexAction()
    {
        return $this->render("@AndyFranklinUrlShortApi/Default/index.html.twig");
    }

    public function retrieveUrlAction($shortUrl)
    {
        $cache = new FileSystemCache();

        if (!$cache->has($shortUrl)) {

            $em = $this->getDoctrine()->getManager();

            /** @var Url $url */
            $url = $em->getRepository(Url::class)->findOneBy(['shortUrl' => $shortUrl]);

            if (!$url) {
                throw $this->createNotFoundException();
            }

            $originalUrl = $url->getOriginalUrl();

            $cache->set($shortUrl, $originalUrl);
        } else {
            $originalUrl = $cache->get($shortUrl);
        }

        return $this->redirectView($originalUrl, 301);
    }

    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        /** @var Url $url */
        $url = $em->getRepository(Url::class)->findBy(['originalUrl' => $request->get('originalUrl')]);

        if (!$url) {
            $url = new Url();
            $url->setUserIp($request->getClientIp());
            $url->setDateCreated(new \DateTime());
            $url->setShortUrl(uniqid());

            $form = $this->get('form.factory')->createNamed('', UrlType::class, $url);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $url = $form->getData();

                $em = $this->getDoctrine()->getManager();
                $em->persist($url);
                $em->flush();
            }
        }

        $view = $this->view($url);
        $view->getContext()->setGroups(['default']);
        return $this->handleView($view);
    }
}
