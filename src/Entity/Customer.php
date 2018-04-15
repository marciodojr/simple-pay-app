<?php

namespace SimplePayApp\Entity;

use Doctrine\ORM\Mapping as ORM;
use InvalidArgumentException;

/**
 * @ORM\Entity
 * @ORM\Table(name="customer")
 * @ORM\HasLifecycleCallbacks
 */
class Customer
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
     * @ORM\Column(name="own_id", type="string", length=128)
     */
    private $ownId;

    /**
     * @ORM\Column(name="gateway_id", type="string", length=128)
     */
    private $gatewayId;

    public function __construct($ownId, $gatewayId)
    {
        $this->ownId = $ownId;
        $this->gatewayId = $gatewayId;
    }

    public function __get($name)
    {
        $this->$name;
    }

}