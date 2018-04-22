<?php

namespace SimplePayApp\Entity\Helper;

use Doctrine\ORM\Mapping as ORM;
use DateTime;

trait EntityTimestampTrait
{
    /**
     * @ORM\Column(name="created_at", type="datetime", nullable=false);
     */
    private $createdAt;

    /**
     * @ORM\Column(name="updated_at", type="datetime", nullable=false);
     */
    private $updatedAt;

    /**
     * @ORM\PrePersist()
     */
    public function setCreatedAt()
    {
        $this->createdAt = new DateTime();
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function updateUpdatedAt()
    {
        $this->updatedAt = new DateTime();
    }

}