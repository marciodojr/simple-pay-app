<?php

namespace SimplePayApp\Service\Entity;

use SimplePayApp\Service\Entity\AbstractEntityService;
use SimplePayApp\Entity\Project;

class ProjectService extends AbstractEntityService
{
    const OAUTH_TOKEN_SIZE = 16;

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

    /**
     * @return \SimplePayApp\Entity\Project
     */
    public function create($namespace, $externalOAuthToken, $gateway, $paymentUri, $refundUri)
    {
        // generates a project token
        $projectOAuthToken = $this->generateOAuthToken();
        $project = new Project($namespace, $projectOAuthToken, $externalOAuthToken, $gateway, $paymentUri, $refundUri);
        $this->em->persist($project);
        $this->em->flush();

        return $project->getArrayCopy();
    }

    /**
     * @return \SimplePayApp\Entity\Project
     */
    public function delete($id)
    {
        $project = $this->em->find('SimplePayApp\Entity\Project', $id);

        if($project) {
            $this->em->remove($project);
            $this->em->flush();
            return true;
        }

        return false;
    }

    private function generateOAuthToken()
    {
        return bin2hex(random_bytes(self::OAUTH_TOKEN_SIZE));
    }
}
