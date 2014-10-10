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
use OC\PlatformBundle\Entity\Application;


class ApplicationTypes extends AbstractFixture implements FixtureInterface {

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $names = array(
            'Ginette' => array(
                'content' => 'je suis candidate',
            ),
        );

        foreach ($names as $autor => $details)
        {
            $advert = new Application();
            $advert->setAuthor($autor);
            $advert->setContent($details['content']);
            $advert->setAdvert($this->getReference('mecanicien'));

            $manager->persist($advert);
        }

        $manager->flush();
    }
}