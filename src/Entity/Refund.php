<?php

namespace SimplePayApp\Entity;

use Doctrine\ORM\Mapping as ORM;
use InvalidArgumentException;

/**
 * @ORM\Entity
 * @ORM\Table(name="refund")
 * @ORM\HasLifecycleCallbacks
 */
class Refund
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
     * @ORM\ManyToOne(targetEntity="Payment")
     * @ORM\JoinColumn(name="payment_id", referencedColumnName="id", nullable=false)
     */
    private $paymentId;

    /**
     * @ORM\Column(name="gateway_id", type="string", length=128, nullable=false)
     */
    private $gatewayId;

    /**
     * @ORM\Column(name="status", type="string", length=64, nullable=false)
     */
    private $status;

    /**
     * @ORM\Column(name="project_notified", type="boolean", nullable=false)
     */
    private $projectNotified;

    public function __construct($paymentId, $gatewayId, $status)
    {
        $this->paymentId = $paymentId;
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
