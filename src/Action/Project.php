<?php

namespace SimplePayApp\Action;

use SimplePayApp\Service\Entity\ProjectService;

final class Project
{
    private $em;

    public function __construct(ProjectService $ps)
    {
        $this->ps = $ps;
    }

    public function fetch($request, $response)
    {
        $projects = $this->ps->fetch();
        return $response->withJSON($projects);
    }
}
