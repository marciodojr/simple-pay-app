<?php

namespace SimplePayApp\Action;

use SimplePayApp\Service\Entity\PaymentService;

class Payment
{

    private $paymentProvider;

    public function __construct(PaymentService $paymentProvider)
    {
        $this->paymentProvider = $paymentProvider;
    }

    public function fetch($request, $response, $args)
    {
        $payments = $this->paymentProvider->fetch($args['projectId']);
        return $response->withJSON($payments);
    }
}