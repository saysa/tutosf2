<?php
/**
 * Created by PhpStorm.
 * User: saysa
 * Date: 10/10/2014
 * Time: 21:09
 */

namespace OC\PlatformBundle\Service\Purge;

use Doctrine\ORM\EntityManager;

class Purge {

    protected $em;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    public function purge($days)
    {
        $oldAdverts = $this->em->getRepository('OCPlatformBundle:Advert')->purge($days);
        #var_dump($oldAdverts);

        foreach($oldAdverts as $advert)
        {
            $this->em->remove($advert);
        }
        $this->em->flush();
    }
} 