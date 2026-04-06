<?php
declare(strict_types=1);

namespace App;

use Cake\Core\Configure;
use Cake\Core\ContainerInterface;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Middleware\ErrorHandlerMiddleware;
use Cake\Http\BaseApplication;
use Cake\Http\Middleware\BodyParserMiddleware;
use Cake\Http\MiddlewareQueue;
use Cake\Routing\Middleware\AssetMiddleware;
use Cake\Routing\Middleware\RoutingMiddleware;

/* IMPORTANTE PARA ARREGLAR LA RUTA DE LA SUBCARPETA */
use Cake\Routing\Router;

/* IMPORTANTES PARA EL LOGIN */
use Authentication\AuthenticationService;
use Authentication\AuthenticationServiceInterface;
use Authentication\AuthenticationServiceProviderInterface;
use Authentication\Middleware\AuthenticationMiddleware;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Application setup class.
 */
class Application extends BaseApplication implements AuthenticationServiceProviderInterface
{
    public function bootstrap(): void
    {
        parent::bootstrap();

        if (PHP_SAPI === 'cli') {
            $this->bootstrapCli();
        }
/*
        if (Configure::read('debug')) {
            $this->addPlugin('DebugKit');
        }*/

        // Cargar el plugin de autenticación
        $this->addPlugin('Authentication');
    }

    public function middleware(MiddlewareQueue $middlewareQueue): MiddlewareQueue
    {
        $middlewareQueue
            ->add(new ErrorHandlerMiddleware(Configure::read('Error'), $this))
            ->add(new AssetMiddleware())
            ->add(new RoutingMiddleware($this))
            ->add(new BodyParserMiddleware())
            // AGREGAR EL MIDDLEWARE DE AUTENTICACIÓN AQUÍ
            ->add(new AuthenticationMiddleware($this));

        return $middlewareQueue;
    }

    /**
     * Configuración del Servicio de Autenticación para el proyecto UPDS
     */
    public function getAuthenticationService(ServerRequestInterface $request): AuthenticationServiceInterface
    {
        $authenticationService = new AuthenticationService([
            // Usamos Router::url para que detecte la subcarpeta /mi_primer_app/ automáticamente
            'unauthenticatedRedirect' => Router::url(['controller' => 'Users', 'action' => 'login']),
            'queryParam' => 'redirect',
        ]);

        // Cargar autenticadores (Sesión y Formulario)
        $authenticationService->loadAuthenticator('Authentication.Session');
        $authenticationService->loadAuthenticator('Authentication.Form', [
            'fields' => [
                'username' => 'correo',
                'password' => 'password',
            ],
            // Usamos Router::url también aquí
            'loginUrl' => Router::url(['controller' => 'Users', 'action' => 'login']),
        ]);

        // Cargar identificador para verificar la contraseña
        $authenticationService->loadIdentifier('Authentication.Password', [
            'fields' => [
                'username' => 'correo',
                'password' => 'password',
            ],
		
	'resolver' => [
                'className' => 'Authentication.Orm',
                'userModel' => 'Users',
            ],
        ]);

        return $authenticationService;
    }

    protected function bootstrapCli(): void
    {
        //$this->addPlugin('Bake');
        //$this->addPlugin('Migrations');
    }
}