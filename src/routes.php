<?php

use Slim\Http\Request;
use Slim\Http\Response;


$app->group('/api/v1', function() {
    
    // projects
    $this->group('/projects', function(){
        // projects        
        $this->get('', 'SimplePayApp\Action\Project:fetch');
        $this->post('', 'SimplePayApp\Action\Project:create');
        $this->delete('/{projectId}', 'SimplePayApp\Action\Project:delete');

        // project payments
        $this->group('/{projectId}/payments', function(){
            $this->get('', 'SimplePayApp\Action\Payment:fetch');
            // $this->post('', 'SimplePayApp\Action\Payment:create');
        });
    });

    
});
// ->add('SimplePayApp\Middleware\Auth');
    
// $app->get('/api/projects/{id}', 'SimplePayApp\Action\Project:fetchOne');