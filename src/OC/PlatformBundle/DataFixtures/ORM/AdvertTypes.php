<?php
/**
 * Created by PhpStorm.
 * User: saysa
 * Date: 09/09/2014
 * Time: 07:15
 */

namespace Vyper\SiteBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use OC\PlatformBundle\Entity\Advert;


class AdvertTypes extends AbstractFixture implements FixtureInterface {

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $now = new \DateTime("now");
        $old = new \DateTime("now");
        $old = $old->sub(new \DateInterval('P20D'));

        $names = array(
            'Vendeur' => array(
                'author'    => 'Bob',
                'content'   => 'Nous cherchons un vendeur',
                'date'      => $now,
            ),
            'Boulanger' => array(
                'author'    => 'Alain',
                'content'   => 'Nous cherchons un Boulanger',
                'date'      => $now,
            ),
            'Mecanicien' => array(
                'author'    => 'Gary',
                'content'   => 'Nous cherchons un Mecanicien',
                'date'      => $old,
            ),
            'Avocat' => array(
                'author'    => 'Gerard',
                'content'   => 'Nous cherchons un Avocat',
                'date'      => $old,
            ),
            'Chauffeur' => array(
                'author'    => 'Claude',
                'content'   => 'Nous cherchons un Chauffeur',
                'date'      => $now,
            ),
        );

        foreach ($names as $title => $details)
        {
            $advert = new Advert();
            $advert->setTitle($title);
            $advert->setAuthor($details['author']);
            $advert->setContent($details['content']);
            $advert->setDate($details['date']);
            $advert->setPublished(true);

            if($title == "Mecanicien") {
                $this->addReference('mecanicien', $advert);
            }

            $manager->persist($advert);
        }

        $manager->flush();
    }
}