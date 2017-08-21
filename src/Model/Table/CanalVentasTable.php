<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CanalVentas Model
 *
 * @property \Cake\ORM\Association\HasMany $Cotizaciones
 *
 * @method \App\Model\Entity\CanalVenta get($primaryKey, $options = [])
 * @method \App\Model\Entity\CanalVenta newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CanalVenta[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CanalVenta|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CanalVenta patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CanalVenta[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CanalVenta findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CanalVentasTable extends Table
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

        $this->setTable('canal_ventas');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Cotizaciones', [
            'foreignKey' => 'canal_venta_id'
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
            ->dateTime('active')
            ->allowEmpty('active');

        return $validator;
    }
}
