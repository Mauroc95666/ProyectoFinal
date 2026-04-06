<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\EventInterface;
// IMPORTACIÓN CLAVE PARA EL IDIOMA
use Cake\I18n\I18n; 

/**
 * Application Controller
 */
class AppController extends Controller
{
    /**
     * Initialization hook method.
     */
    public function initialize(): void
    {
        parent::initialize();

       // $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        
        // Cargar el componente de Autenticación para proteger el sistema
        $this->loadComponent('Authentication.Authentication');
    }

    /**
     * Se ejecuta ANTES de cualquier acción en los controladores
     */
  public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        // 1. Obtenemos al usuario que inició sesión
        $identity = $this->request->getAttribute('identity');

        // 2. Revisamos si existe un usuario logueado y qué idioma tiene en la base de datos
        if ($identity && $identity->get('language')) {
            $idiomaUser = $identity->get('language');
            
            if ($idiomaUser === 'en') {
                I18n::setLocale('en_US'); // Cambia a Inglés si su BD dice 'en'
            } else {
                I18n::setLocale('es_ES'); // Cambia a Español si su BD dice 'es' o cualquier otra cosa
            }
        } else {
            // 3. Idioma por defecto si nadie ha iniciado sesión (pantalla de login)
            I18n::setLocale('es_ES'); 
        }
    }

    /**
     * Se ejecuta ANTES de dibujar las pantallas (vistas)
     */
    public function beforeRender(EventInterface $event)
    {
        // Rescatamos la identidad del usuario que inició sesión
        $currentUser = $this->request->getAttribute('identity');
        
        // Enviamos la variable 'currentUser' a la barra de navegación y demás vistas
        $this->set('currentUser', $currentUser);
    }
}