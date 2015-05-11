<?php

namespace Blog\ModelBundle\DataFixtures\ORM;

use Blog\ModelBundle\Entity\Post;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Fixtures for the Posts Entity
 * @package Blog\ModelBundle\DataFixtures\ORM
 */
class Posts extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $p1 = new Post();
        $p1->setTitle('Lorem ipsum dolor sit amet');
        $p1->setBody('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vitae risus tempor, pretium metus ac, cursus nunc. In varius luctus urna, in porttitor purus consequat id. Donec scelerisque vestibulum mi eu tempus. Praesent varius vehicula risus sed feugiat. Maecenas euismod neque urna, nec aliquet sem imperdiet et. Quisque et vestibulum arcu, id venenatis tortor. Vestibulum quis vestibulum risus, et laoreet nisi. Etiam efficitur massa nec imperdiet vehicula. Proin ut facilisis mi. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla facilisi. Vivamus ligula felis, lobortis eu erat at, finibus eleifend elit. Suspendisse quis finibus metus. Maecenas elementum metus interdum maximus elementum. Sed laoreet condimentum ex, sit amet interdum urna consectetur vel. Aliquam mauris quam, efficitur at pulvinar at, commodo eget tortor.

Suspendisse et iaculis dolor. Cras tempus in eros ac pulvinar. Curabitur orci nibh, cursus nec convallis a, pulvinar vitae mi. Suspendisse at purus vel enim eleifend bibendum. Aenean venenatis erat nec nisi suscipit, ac bibendum lorem cursus. Donec eget lorem in urna placerat hendrerit vel nec ante. Donec sed euismod lorem, ac porta risus. Sed nec lacinia enim. Pellentesque ac rhoncus dui.');
        $p1->setAuthor($this->getAuthor($manager, 'Sergey'));

        $p2 = new Post();
        $p2->setTitle('Curabitur dapibus rhoncus justo ac mattis');
        $p2->setBody('Curabitur dapibus rhoncus justo ac mattis. Mauris in felis sed urna blandit rutrum a tincidunt nunc. Sed nisl purus, volutpat ut lacus in, fermentum posuere lectus. Ut mi ipsum, fringilla quis nulla rhoncus, condimentum luctus nunc. Etiam fringilla leo quam, et luctus nunc euismod et. Nunc augue ligula, vehicula in varius eu, ornare non lorem. Integer imperdiet ipsum a lacus consequat, nec rutrum augue tincidunt. Morbi fringilla ex ut elit scelerisque, ut consequat sapien vehicula. Nunc rhoncus maximus nulla a feugiat. Nulla facilisi. Mauris vel tempus odio. Pellentesque felis purus, interdum eu gravida id, porta ac nulla. Pellentesque consectetur risus quis lobortis tristique.');
        $p2->setAuthor($this->getAuthor($manager, 'John'));

        $p3 = new Post();
        $p3->setTitle('Ut lacinia nibh arcu, quis pharetra nunc elementum eu');
        $p3->setBody('Ut lacinia nibh arcu, quis pharetra nunc elementum eu. Cras odio tellus, hendrerit sed ornare porttitor, sollicitudin non lorem. Aenean id rhoncus quam. Duis id magna sit amet sem aliquet egestas. Sed a placerat tortor, et sodales velit. Quisque et ullamcorper purus. Vivamus pellentesque augue vel velit hendrerit fermentum gravida nec nisl.

Praesent leo lectus, molestie ut diam aliquam, tincidunt sagittis erat. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut condimentum convallis tempus. Cras vehicula, ante ac dignissim rhoncus, nibh diam rutrum nunc, sed ultrices augue enim a est. Suspendisse commodo, urna nec luctus semper, ligula erat tempus eros, sit amet varius turpis nulla eu elit. Pellentesque hendrerit porttitor facilisis. Vivamus fringilla libero hendrerit risus hendrerit, id aliquam ipsum rhoncus. Integer ut posuere massa.');
        $p3->setAuthor($this->getAuthor($manager, 'Sergey'));

        $manager->persist($p1);
        $manager->persist($p2);
        $manager->persist($p3);

        $manager->flush();
    }

    /**
     * Get an author
     *
     * @param ObjectManager $manager
     * @param string        $name
     *
     * @return Author
     */
    private function getAuthor(ObjectManager $manager, $name)
    {
        return $manager->getRepository('ModelBundle:Author')->findOneBy(
            array(
                'name' => $name,
            )
        );
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 15;
    }
}