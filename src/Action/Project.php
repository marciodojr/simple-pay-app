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

    public function create($request, $response)
    {
        $args = $request->getParams();
        $project = $this->ps->create($args['namespace'], $args['externalOAuthToken'], $args['gateway'], $args['paymentUri'], $args['refundUri']);
        return $response->withJSON($project);
    }

    public function delete($request, $response, $args)
    {
        $this->ps->delete($args['projectId']);
        
        return $response;
    }
}
