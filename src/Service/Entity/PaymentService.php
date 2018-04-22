<?php

namespace SimplePayApp\Service\Entity;

use SimplePayApp\Service\Entity\AbstractEntityService;
use SimplePayApp\Entity\Payment;

class PaymentService extends AbstractEntityService
{

    /**
     * @return array
     */
    public function fetch($projectId)
    {
        $payments = $this->em->getRepository('SimplePayApp\Entity\Payment')->findBy([
            'projectId' => $projectId
        ]);
        
        $payments = array_map(
            function ($payments) {
                return $payments->getArrayCopy();
            },
            $payments
        );

        return $payments;
    }
}
