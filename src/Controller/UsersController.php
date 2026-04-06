<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    /**
     * beforeFilter method
     */
    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        // Permitir que entren al login y al registro sin estar logueados
        $this->Authentication->addUnauthenticatedActions(['login', 'add']);
    }

    /**
     * Login method
     */
    public function login()
    {
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        
        // Si entra con éxito, redirigir al CRUD de Climas
        if ($result->isValid()) {
            return $this->redirect(['controller' => 'LecturasMeteorologicas', 'action' => 'index']);
        }
        
        // Si falló, mostrar el error
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Correo o contraseña incorrectos.'));
        }
    }

    /**
     * Logout method
     */
    public function logout()
    {
        $result = $this->Authentication->getResult();
        if ($result && $result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }

    /**
     * Index method
     */
   public function index()
    {
        // --- INICIO DEL SISTEMA DE BÚSQUEDA ---
        $buscar = $this->request->getQuery('buscar');
        $query = $this->Users->find();

        if ($buscar) {
            // Filtramos por nombre O por correo
            $query->where([
                'OR' => [
                    ['nombre LIKE' => '%' . $buscar . '%'],
                    ['correo LIKE' => '%' . $buscar . '%']
                ]
            ]);
        }

        $users = $this->paginate($query);
        $this->set(compact('users', 'buscar'));
    }
    /**
     * View method
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, contain: []);
        $this->set(compact('user'));
    }

    /**
     * Add method
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('El usuario ha sido registrado.'));
                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('El usuario no pudo ser guardado. Por favor, intente de nuevo.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Usuario actualizado correctamente.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo actualizar el usuario.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('Usuario eliminado.'));
        } else {
            $this->Flash->error(__('No se pudo eliminar el usuario.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}