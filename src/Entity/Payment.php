<?php

namespace SimplePayApp\Entity;

use Doctrine\ORM\Mapping as ORM;
use InvalidArgumentException;

/**
 * @ORM\Entity
 * @ORM\Table(name="payment")
 * @ORM\HasLifecycleCallbacks
 */
class Payment
{
    use \SimplePayApp\Entity\Helper\EntityTimestampTrait;
    use \SimplePayApp\Entity\Helper\ArrayCopyTrait;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="gateway_id", type="string", length=128)
     */
    private $gatewayId;

    /**
     * @ORM\Column(name="status", type="string", length=64)
     */
    private $status;

    /**
     * @ORM\Column(name="project_notified", type="boolean")
     */
    private $projectNotified;

    public function __construct($ownId, $gatewayId, $status)
    {
        $this->ownId = $ownId;
        $this->gatewayId = $gatewayId;
        $this->status = $status;
        $this->projectNotified = false;
    }

    public function setProjectNotified($projectNotified)
    {
        $this->projectNotified = $projectNotified;
    }

    public function setStatus($newStatus)
    {
        $this->status = $newStatus;
    }

    public function __get($name)
    {
        $this->$name;
    }

}