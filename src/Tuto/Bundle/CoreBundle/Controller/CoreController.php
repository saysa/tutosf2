<?php

namespace Tuto\Bundle\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CoreController extends Controller
{
    public function indexAction()
    {
        $listAdverts = array(
            array(
                'title'   => 'Recherche développpeur Symfony2',
                'id'      => 1,
                'author'  => 'Alexandre',
                'content' => 'Nous recherchons un développeur Symfony2 débutant sur Lyon. Blabla…',
                'date'    => new \Datetime()),
            array(
                'title'   => 'Mission de webmaster',
                'id'      => 2,
                'author'  => 'Hugo',
                'content' => 'Nous recherchons un webmaster capable de maintenir notre site internet. Blabla…',
                'date'    => new \Datetime()),
            array(
                'title'   => 'Offre de stage webdesigner',
                'id'      => 3,
                'author'  => 'Mathieu',
                'content' => 'Nous proposons un poste pour webdesigner. Blabla…',
                'date'    => new \Datetime())
        );

        // Mais pour l'instant, on ne fait qu'appeler le template
        return $this->render('TutoCoreBundle:Default:index.html.twig', array(
            'listAdverts' => $listAdverts
        ));

    }

    public function contactAction(Request $request)
    {
        $session = $request->getSession();

        $session->getFlashBag()->add('info', 'La page de contact n\'est pas encore disponible.');

        return $this->redirect($this->generateUrl('core'));
    }
}
