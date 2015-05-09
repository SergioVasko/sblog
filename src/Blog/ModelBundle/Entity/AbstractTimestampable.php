<?php

namespace Blog\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Timestampable abstract class to define created behavior
 * @package Blog\ModelBundle\Entity
 *
 * @ORM\MappedSuperclass
 */
abstract class AbstractTimestampable
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * Author constructor.
     */
    public function __construct()
    {
        $this->createdAt = \DateTime();
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Author
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
}
