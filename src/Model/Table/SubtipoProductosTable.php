<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SubtipoProductos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $TipoProductos
 * @property \Cake\ORM\Association\HasMany $DetalleAsignaciones
 *
 * @method \App\Model\Entity\SubtipoProducto get($primaryKey, $options = [])
 * @method \App\Model\Entity\SubtipoProducto newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SubtipoProducto[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SubtipoProducto|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SubtipoProducto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SubtipoProducto[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SubtipoProducto findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SubtipoProductosTable extends Table
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

        $this->setTable('subtipo_productos');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('TipoProductos', [
            'foreignKey' => 'tipo_producto_id'
        ]);
        $this->hasMany('DetalleAsignaciones', [
            'foreignKey' => 'subtipo_producto_id'
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

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['tipo_producto_id'], 'TipoProductos'));

        return $rules;
    }
}
