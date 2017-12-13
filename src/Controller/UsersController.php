<?php
namespace App\Controller;

use App\Controller\AppController;
use Model\Entity\Cars;
use Model\Entity\Reservation;
use Cake\ORM\TableRegistry;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    public function login()
    {
        if ($this->request->is('POST')) {
            $user = $this->Users->find()->where(['username'=>$this->request->data('username'),'password' => $this->request->data('password')])->toArray();
            var_dump($user);
            // if ($this->Auth->login()){
            //     return $this->redirect($this->Auth->redirectUrl());
            // } else {
            //     $this->Session->setFlash(__('E-mail e/ou usuário incorretos, tente novamente.'));
            // } // end if cannot log in
            if($user){
                // $this->Auth->setUser($user);
                return $this->redirect(['action' => 'listCars', $user[0]['id']]);
            }else{
                $this->Flash->error('Error, datos invalidos...', ['key'=>'auth']);
            }
        }
    }


    public function listCars($iduser)
    {
        $cars = $this->loadModel('Cars')->find('all');
        // var_dump($iduser);
        $this->set(compact('cars', 'iduser'));
        $this->set('_serialize', ['cars']);
    }

    public function reserva($id, $iduser)
    {
        $reservaTable = TableRegistry::get('Reservations');
        $reserva = $reservaTable->newEntity();

       
        $carsTable = TableRegistry::get('Cars');
        $cars = $carsTable->get($id);

        $user = $this->Users->get($iduser);

        // $cantreserva = $this->loadModel('Reservations')->find()->where(['users_id'=>$userid])->count();
        if ($this->request->is('post')) {
            // var_dump($this->request->data);
            // $car = $this->loadModel('Cars')->find()->where(['id'=>$id])->toArray();

            $fecha_inicio = date("Y-m-d", strtotime($this->request->data('fecha_inicio')) );
            $fecha_fin = date("Y-m-d H", strtotime($this->request->data('fecha_fin')));

            $reserva->hora = $this->request->data('hora');
            $reserva->fecha_inicio = $fecha_inicio;
            $reserva->fecha_fin = $fecha_fin;
            $reserva->cars_id = $cars->id;
            $reserva->users_id = $user->id;

            $cars->disponible = false;
            $carsTable->save($cars);

            if ($reservaTable->save($reserva)) {
                $this->Flash->success(__('La reserva ha sido creada satisfactoriamente.'));

                return $this->redirect(['action' => 'listCars', $user->id]);
            }
            $this->Flash->error(__('No se puede crear la reserva. Intenta nuevamente'));
        }
        $this->set(compact('reserva'));
        $this->set('_serialize', ['reserva']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
