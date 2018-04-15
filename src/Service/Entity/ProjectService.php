<?php

namespace SimplePayApp\Service\Entity;

use SimplePayApp\Service\Entity\AbstractEntityService;

class ProjectService extends AbstractEntityService
{
    /**
     * @return array
     */
    public function fetch()
    {
        $projects = $this->em->getRepository('SimplePayApp\Entity\Project')->findAll();
        
        $projects = array_map(
            function ($project) {
                return $project->getArrayCopy();
            },
            $projects
        );

        return $projects;
    }
}
