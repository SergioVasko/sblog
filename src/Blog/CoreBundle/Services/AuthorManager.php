<?php

namespace Blog\CoreBundle\Services;

use Blog\ModelBundle\Entity\Author;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class AuthorManager
 */
class AuthorManager
{
    private $em;

    /**
     * AuthorManager constructor.
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * Find author by slug
     *
     * @param string $slug
     *
     * @throws NotFoundHttpException
     *
     * @return Author
     */
    public function findBySlug($slug)
    {
        $author = $this->em->getRepository('ModelBundle:Author')->findOneBy(
            array('slug' => $slug)
        );

        if (null === $author) {
            throw new NotFoundHttpException('Author was not found');
        }

        return $author;
    }

    /**
     * Find all posts for the given author
     *
     * @param Author $author
     *
     * @throws NotFoundHttpException
     *
     * @return array|\Blog\ModelBundle\Entity\Post[]
     */
    public function findPosts(Author $author)
    {
        $posts = $this->em->getRepository('ModelBundle:Post')->findBy(
            array('author' => $author)
        );

        if (null === $posts) {
            throw new NotFoundHttpException('Posts was not found');
        }

        return $posts;
    }
}
