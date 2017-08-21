<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cotizaciones Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Cotizaciones
 * @property \Cake\ORM\Association\BelongsTo $Entidades
 * @property \Cake\ORM\Association\BelongsTo $CanalVentas
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\HasMany $Cotizaciones
 * @property \Cake\ORM\Association\HasMany $ItemCotizaciones
 * @property \Cake\ORM\Association\HasMany $Pasajero
 *
 * @method \App\Model\Entity\Cotizacione get($primaryKey, $options = [])
 * @method \App\Model\Entity\Cotizacione newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Cotizacione[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Cotizacione|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cotizacione patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Cotizacione[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Cotizacione findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CotizacionesTable extends Table
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

        $this->setTable('cotizaciones');
        $this->setDisplayField('cotizacione_id');
        $this->setPrimaryKey('cotizacione_id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Cotizaciones', [
            'foreignKey' => 'cotizacione_id'
        ]);
        $this->belongsTo('Entidades', [
            'foreignKey' => 'entidade_id'
        ]);
        $this->belongsTo('CanalVentas', [
            'foreignKey' => 'canal_venta_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Cotizaciones', [
            'foreignKey' => 'cotizacione_id'
        ]);
        $this->hasMany('ItemCotizaciones', [
            'foreignKey' => 'cotizacione_id'
        ]);
        $this->hasMany('Pasajero', [
            'foreignKey' => 'cotizacione_id'
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
            ->integer('version')
            ->allowEmpty('version');

        $validator
            ->numeric('total')
            ->allowEmpty('total');

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
        $rules->add($rules->existsIn(['cotizacione_id'], 'Cotizaciones'));
        $rules->add($rules->existsIn(['entidade_id'], 'Entidades'));
        $rules->add($rules->existsIn(['canal_venta_id'], 'CanalVentas'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
