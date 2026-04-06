<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
// IMPORTACIÓN CLAVE PARA QUE FUNCIONE LA ENCRIPTACIÓN
use Authentication\PasswordHasher\DefaultPasswordHasher;

/**
 * User Entity
 */
class User extends Entity
{
    /**
     * Campos que se pueden guardar masivamente desde el formulario
     */
    protected array $_accessible = [
        'nombre' => true,
        'apellido' => true,
        'correo' => true,
        'pais' => true,
        'password' => true,
        'language' => true,
        'created' => true,
        'modified' => true,
    ];

    /**
     * Campos que se ocultan cuando el usuario se muestra en JSON o arreglos
     */
    protected array $_hidden = [
        'password',
    ];

    /**
     * Función automática que encripta la contraseña antes de guardarla
     */
    protected function _setPassword(string $password) : ?string
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher())->hash($password);
        }
        return $password;
    }
}