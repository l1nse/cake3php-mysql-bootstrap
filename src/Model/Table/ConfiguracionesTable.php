<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Configuraciones Model
 *
 * @method \App\Model\Entity\Configuracione get($primaryKey, $options = [])
 * @method \App\Model\Entity\Configuracione newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Configuracione[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Configuracione|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Configuracione patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Configuracione[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Configuracione findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ConfiguracionesTable extends Table
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

        $this->setTable('configuraciones');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->integer('tipo_descripcion')
            ->requirePresence('tipo_descripcion', 'create')
            ->notEmpty('tipo_descripcion');

        $validator
            ->requirePresence('parametro', 'create')
            ->notEmpty('parametro');

        $validator
            ->integer('active')
            ->requirePresence('active', 'create')
            ->notEmpty('active');

        return $validator;
    }
}
