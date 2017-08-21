<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TipoCuentas Model
 *
 * @property \Cake\ORM\Association\HasMany $FichaPersonales
 *
 * @method \App\Model\Entity\TipoCuenta get($primaryKey, $options = [])
 * @method \App\Model\Entity\TipoCuenta newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TipoCuenta[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TipoCuenta|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TipoCuenta patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TipoCuenta[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TipoCuenta findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TipoCuentasTable extends Table
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

        $this->setTable('tipo_cuentas');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('FichaPersonales', [
            'foreignKey' => 'tipo_cuenta_id'
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

        return $validator;
    }
}
