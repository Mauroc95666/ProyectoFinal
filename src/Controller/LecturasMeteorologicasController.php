<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * LecturasMeteorologicas Controller
 *
 * @property \App\Model\Table\LecturasMeteorologicasTable $LecturasMeteorologicas
 */
class LecturasMeteorologicasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        // --- INICIO DEL SISTEMA DE BÚSQUEDA ---
        $buscar = $this->request->getQuery('buscar');
        $query = $this->LecturasMeteorologicas->find();

        if ($buscar) {
            // Filtramos por ubicación si el usuario escribió algo en el buscador
            $query->where(['ubicacion LIKE' => '%' . $buscar . '%']);
        }

        $lecturasMeteorologicas = $this->paginate($query);

        // Enviamos la variable $buscar a la vista para que el cajón mantenga el texto buscado
        $this->set(compact('lecturasMeteorologicas', 'buscar'));
    }

    /**
     * View method
     *
     * @param string|null $id Lecturas Meteorologica id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $lecturasMeteorologica = $this->LecturasMeteorologicas->get($id, contain: []);
        $this->set(compact('lecturasMeteorologica'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $lecturasMeteorologica = $this->LecturasMeteorologicas->newEmptyEntity();
        if ($this->request->is('post')) {
            $lecturasMeteorologica = $this->LecturasMeteorologicas->patchEntity($lecturasMeteorologica, $this->request->getData());
            
            // --- MAGIA: ASIGNAMOS EL ID DEL USUARIO LOGUEADO AUTOMÁTICAMENTE ---
            $identity = $this->request->getAttribute('identity');
            if ($identity) {
                $lecturasMeteorologica->user_id = $identity->getIdentifier();
            }

            if ($this->LecturasMeteorologicas->save($lecturasMeteorologica)) {
                $this->Flash->success(__('La lectura meteorológica ha sido registrada correctamente.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo registrar la lectura. Por favor, intente de nuevo.'));
        }
        $this->set(compact('lecturasMeteorologica'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Lecturas Meteorologica id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $lecturasMeteorologica = $this->LecturasMeteorologicas->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $lecturasMeteorologica = $this->LecturasMeteorologicas->patchEntity($lecturasMeteorologica, $this->request->getData());
            if ($this->LecturasMeteorologicas->save($lecturasMeteorologica)) {
                $this->Flash->success(__('La lectura meteorológica ha sido actualizada correctamente.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo actualizar la lectura. Por favor, intente de nuevo.'));
        }
        $this->set(compact('lecturasMeteorologica'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Lecturas Meteorologica id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $lecturasMeteorologica = $this->LecturasMeteorologicas->get($id);
        
        if ($this->LecturasMeteorologicas->delete($lecturasMeteorologica)) {
            $this->Flash->success(__('La lectura meteorológica ha sido eliminada.'));
        } else {
            $this->Flash->error(__('No se pudo eliminar la lectura meteorológica. Por favor, intente de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}