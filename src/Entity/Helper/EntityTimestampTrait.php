<?php

namespace SimplePayApp\Entity\Helper;

use Doctrine\ORM\Mapping as ORM;
use DateTime;

trait EntityTimestampTrait
{
    /**
     * @ORM\Column(name="created_at", type="datetime");
     */
    private $createdAt;

    /**
     * @ORM\Column(name="updated_at", type="datetime");
     */
    private $updatedAt;

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function updateUpdatedAt()
    {
        $this->updatedAt = new DateTime();
    }

}