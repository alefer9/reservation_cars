<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cars Model
 *
 * @method \App\Model\Entity\Car get($primaryKey, $options = [])
 * @method \App\Model\Entity\Car newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Car[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Car|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Car patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Car[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Car findOrCreate($search, callable $callback = null, $options = [])
 */
class CarsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('cars');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('marca')
            ->maxLength('marca', 255)
            ->requirePresence('marca', 'create')
            ->notEmpty('marca');

        $validator
            ->scalar('modelo')
            ->maxLength('modelo', 255)
            ->requirePresence('modelo', 'create')
            ->notEmpty('modelo');

        $validator
            ->requirePresence('precio', 'create')
            ->notEmpty('precio');

        $validator
            ->boolean('disponible')
            ->requirePresence('disponible', 'create')
            ->notEmpty('disponible');

        $validator
            ->integer('puertas')
            ->requirePresence('puertas', 'create')
            ->notEmpty('puertas');

        $validator
            ->boolean('diesel')
            ->requirePresence('diesel', 'create')
            ->notEmpty('diesel');

        $validator
            ->scalar('tamanio')
            ->maxLength('tamanio', 255)
            ->requirePresence('tamanio', 'create')
            ->notEmpty('tamanio');

        return $validator;
    }
}
