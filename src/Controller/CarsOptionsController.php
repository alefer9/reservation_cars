<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CarsOptions Controller
 *
 * @property \App\Model\Table\CarsOptionsTable $CarsOptions
 *
 * @method \App\Model\Entity\CarsOption[] paginate($object = null, array $settings = [])
 */
class CarsOptionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $carsOptions = $this->paginate($this->CarsOptions);

        $this->set(compact('carsOptions'));
        $this->set('_serialize', ['carsOptions']);
    }

    /**
     * View method
     *
     * @param string|null $id Cars Option id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $carsOption = $this->CarsOptions->get($id, [
            'contain' => []
        ]);

        $this->set('carsOption', $carsOption);
        $this->set('_serialize', ['carsOption']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $carsOption = $this->CarsOptions->newEntity();
        if ($this->request->is('post')) {
            $carsOption = $this->CarsOptions->patchEntity($carsOption, $this->request->getData());
            if ($this->CarsOptions->save($carsOption)) {
                $this->Flash->success(__('The cars option has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cars option could not be saved. Please, try again.'));
        }
        $this->set(compact('carsOption'));
        $this->set('_serialize', ['carsOption']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cars Option id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $carsOption = $this->CarsOptions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $carsOption = $this->CarsOptions->patchEntity($carsOption, $this->request->getData());
            if ($this->CarsOptions->save($carsOption)) {
                $this->Flash->success(__('The cars option has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cars option could not be saved. Please, try again.'));
        }
        $this->set(compact('carsOption'));
        $this->set('_serialize', ['carsOption']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cars Option id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $carsOption = $this->CarsOptions->get($id);
        if ($this->CarsOptions->delete($carsOption)) {
            $this->Flash->success(__('The cars option has been deleted.'));
        } else {
            $this->Flash->error(__('The cars option could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
