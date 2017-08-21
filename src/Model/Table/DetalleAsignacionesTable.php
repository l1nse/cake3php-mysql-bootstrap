<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DetalleAsignaciones Model
 *
 * @property \Cake\ORM\Association\BelongsTo $SubtipoProductos
 * @property \Cake\ORM\Association\BelongsTo $Asignaciones
 *
 * @method \App\Model\Entity\DetalleAsignacione get($primaryKey, $options = [])
 * @method \App\Model\Entity\DetalleAsignacione newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DetalleAsignacione[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DetalleAsignacione|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DetalleAsignacione patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DetalleAsignacione[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DetalleAsignacione findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DetalleAsignacionesTable extends Table
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

        $this->setTable('detalle_asignaciones');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('SubtipoProductos', [
            'foreignKey' => 'subtipo_producto_id'
        ]);
        $this->belongsTo('Asignaciones', [
            'foreignKey' => 'asignacione_id'
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
            ->numeric('cantidad')
            ->allowEmpty('cantidad');

        $validator
            ->date('fecha_inicio')
            ->allowEmpty('fecha_inicio');

        $validator
            ->date('fecha_termino')
            ->allowEmpty('fecha_termino');

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
        $rules->add($rules->existsIn(['subtipo_producto_id'], 'SubtipoProductos'));
        $rules->add($rules->existsIn(['asignacione_id'], 'Asignaciones'));

        return $rules;
    }
}
