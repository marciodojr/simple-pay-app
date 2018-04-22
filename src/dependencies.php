<?php
// DIC configuration

use SimplePayApp\Service\Entity\ProjectService;
use SimplePayApp\Action\Project;
use SimplePayApp\Service\Entity\PaymentService;
use SimplePayApp\Action\Payment;

$container = $app->getContainer();


// ############################ LOGGER

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};


// ############################ ORM
// Doctrine
$container['em'] = function ($c) {
    $settings = $c->get('settings');
    $config = Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(
        $settings['doctrine']['meta']['entity_path'],
        $settings['doctrine']['meta']['auto_generate_proxies'],
        $settings['doctrine']['meta']['proxy_dir'],
        $settings['doctrine']['meta']['cache'],
        false
    );
    return Doctrine\ORM\EntityManager::create($settings['doctrine']['connection'], $config);
};

// ############################ AUTH
// AuthService

$container['SimplePayApp\Service\Auth\AuthService'] = function ($c) {
    $logger = $c->get('logger');
    $logger->info('Auth service call');
    return new SimplePayApp\Service\Auth\AuthService();
};

// AuthMiddleware

$container['SimplePayApp\Middleware\Auth'] = function ($c) {
    $logger = $c->get('logger');
    $logger->info('Auth middleware call');
    return new SimplePayApp\Middleware\Auth($c->get('SimplePayApp\Service\Auth\AuthService'));
};


// ############################ ORM Services

//ProjectService
$container[ProjectService::class] = function ($c) {
    return new ProjectService($c->get('em'));
};

//PaymentService
$container[PaymentService::class] = function ($c) {
    return new PaymentService($c->get('em'));
};

// ############################ Actions (Controllers)

// ProjectAction
$container[Project::class] = function ($c) {
    return new Project($c->get(ProjectService::class));
};

// PaymentAction
$container[Payment::class] = function ($c) {
    return new Payment($c->get(PaymentService::class));
};