<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TipoMovimientos Model
 *
 * @property \Cake\ORM\Association\HasMany $FichaPersonales
 *
 * @method \App\Model\Entity\TipoMovimiento get($primaryKey, $options = [])
 * @method \App\Model\Entity\TipoMovimiento newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TipoMovimiento[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TipoMovimiento|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TipoMovimiento patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TipoMovimiento[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TipoMovimiento findOrCreate($search, callable $callback = null, $options = [])
 */
class TipoMovimientosTable extends Table
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

        $this->setTable('tipo_movimientos');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('FichaPersonales', [
            'foreignKey' => 'tipo_movimiento_id'
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
            ->integer('active')
            ->allowEmpty('active');

        return $validator;
    }
}
