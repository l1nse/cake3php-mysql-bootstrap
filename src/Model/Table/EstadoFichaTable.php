<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EstadoFicha Model
 *
 * @property \Cake\ORM\Association\HasMany $FichaNegocios
 *
 * @method \App\Model\Entity\EstadoFicha get($primaryKey, $options = [])
 * @method \App\Model\Entity\EstadoFicha newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\EstadoFicha[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EstadoFicha|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EstadoFicha patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EstadoFicha[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\EstadoFicha findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EstadoFichaTable extends Table
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

        $this->setTable('estado_ficha');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('FichaNegocios', [
            'foreignKey' => 'estado_ficha_id'
        ]);
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
            ->allowEmpty('nombre');

        $validator
            ->integer('active')
            ->allowEmpty('active');

        return $validator;
    }
}
