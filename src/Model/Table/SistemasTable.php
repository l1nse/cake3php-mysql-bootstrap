<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sistemas Model
 *
 * @property \Cake\ORM\Association\HasMany $Tickets
 *
 * @method \App\Model\Entity\Sistema get($primaryKey, $options = [])
 * @method \App\Model\Entity\Sistema newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Sistema[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Sistema|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sistema patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Sistema[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Sistema findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SistemasTable extends Table
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

        $this->setTable('sistemas');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Tickets', [
            'foreignKey' => 'sistema_id'
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
            ->allowEmpty('name');

        $validator
            ->allowEmpty('name_contacto');

        $validator
            ->allowEmpty('email_contacto');

        $validator
            ->allowEmpty('rut_empresa');

        $validator
            ->allowEmpty('name_empresa');

        $validator
            ->allowEmpty('direccion_empresa');

        $validator
            ->integer('active')
            ->allowEmpty('active');

        return $validator;
    }
}
