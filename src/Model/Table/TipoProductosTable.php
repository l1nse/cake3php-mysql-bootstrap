<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TipoProductos Model
 *
 * @property \Cake\ORM\Association\HasMany $Asignaciones
 * @property \Cake\ORM\Association\HasMany $SubtipoProductos
 *
 * @method \App\Model\Entity\TipoProducto get($primaryKey, $options = [])
 * @method \App\Model\Entity\TipoProducto newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TipoProducto[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TipoProducto|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TipoProducto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TipoProducto[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TipoProducto findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TipoProductosTable extends Table
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

        $this->setTable('tipo_productos');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Asignaciones', [
            'foreignKey' => 'tipo_producto_id'
        ]);
        $this->hasMany('SubtipoProductos', [
            'foreignKey' => 'tipo_producto_id'
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
