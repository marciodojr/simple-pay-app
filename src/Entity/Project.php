<?php

namespace SimplePayApp\Entity;

use Doctrine\ORM\Mapping as ORM;
use InvalidArgumentException;

/**
 * @ORM\Entity
 * @ORM\Table(name="project")
 * @ORM\HasLifecycleCallbacks
 */
class Project
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
     * @ORM\Column(type="string", length=64, unique=true, nullable=false)
     */
    private $namespace;

    /**
     * @ORM\Column(name="project_oauth_token", type="string", length=256, unique=true, nullable=false)
     */
    private $projectOAuthToken;

    /**
     * @ORM\Column(name="external_oauth_token", type="string", length=256, nullable=false)
     */
    private $externalOAuthToken;

    /**
     * @ORM\Column(type="string", length=64, nullable=false)
     */
    private $gateway;

    /**
     * @ORM\Column(name="payment_uri", type="string", length=64, nullable=false)
     */
    private $paymentUri;
    
    /**
     * @ORM\Column(name="refund_uri", type="string", length=64, nullable=false)
     */
    private $refundUri;

    const GATEWAY_MOIP = 'MOIP';

    public function __construct($namespace, $projectOAuthToken, $externalOAuthToken, $gateway, $paymentUri, $refundUri)
    {

        if(!in_array($gateway, [
            self::GATEWAY_MOIP
        ])) {
            throw new InvalidArgumentException("Invalid gateway '$gateway'");
        }

        $this->namespace = $namespace;
        $this->projectOAuthToken = $projectOAuthToken;
        $this->externalOAuthToken = $externalOAuthToken;
        $this->gateway = $gateway;
        $this->paymentUri = $paymentUri;
        $this->refundUri = $refundUri;
    }

    public function __get($name)
    {
        $this->$name;
    }

}
