<?php

namespace Blog\ModelBundle\DataFixtures\ORM;

use Blog\ModelBundle\Entity\Comment;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Fixtures for the Comment Entity
 */
class Comments extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 20;
    }

    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $posts = $manager->getRepository('ModelBundle:Post')->findAll();

        $comments = array(
            0 => 'Donec eu condimentum nunc. Phasellus eget libero efficitur, maximus ante a, aliquet massa.',
            1 => 'Vivamus tempus, ligula ut sagittis molestie, leo nisi viverra ex, et ultricies nisi risus sed libero. Morbi et rutrum mi, a fermentum eros. Praesent nec blandit nisi, vel tincidunt ligula. Curabitur risus mauris, convallis a metus a, faucibus posuere odio. Morbi imperdiet in dolor ac hendrerit. Maecenas nec arcu elit. Pellentesque vitae lacinia ex, nec rhoncus arcu.',
            2 => 'Nullam eu accumsan turpis, a feugiat risus. Integer vitae dui dui. Aenean ut justo non enim congue hendrerit nec id tortor. Praesent augue tortor, accumsan quis eros non, consectetur scelerisque justo. Mauris vel nisl tristique, efficitur risus non, ornare ligula. Donec non dapibus velit, sit amet sollicitudin mauris.',
        );

        $i =0;
        foreach ($posts as $post) {
            $comment = new Comment();
            $comment->setAuthorName('Someone');
            $comment->setBody($comments[$i++]);
            $comment->setPost($post);

            $manager->persist($comment);
        }
        $manager->flush();
    }
}
