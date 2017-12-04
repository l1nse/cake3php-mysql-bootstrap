<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Utilidades Model
 *
 * @property \Cake\ORM\Association\BelongsTo $FichaNegocios
 *
 * @method \App\Model\Entity\Utilidade get($primaryKey, $options = [])
 * @method \App\Model\Entity\Utilidade newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Utilidade[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Utilidade|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Utilidade patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Utilidade[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Utilidade findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UtilidadesTable extends Table
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

        $this->setTable('utilidades');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('FichaNegocios', [
            'foreignKey' => 'ficha_negocio_id'
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
            ->numeric('total_comag_clp')
            ->allowEmpty('total_comag_clp');

        $validator
            ->numeric('total_comag_usd')
            ->allowEmpty('total_comag_usd');

        $validator
            ->numeric('total_fee_clp')
            ->allowEmpty('total_fee_clp');

        $validator
            ->numeric('total_fee_usd')
            ->allowEmpty('total_fee_usd');

        $validator
            ->numeric('diferencia_clp')
            ->allowEmpty('diferencia_clp');

        $validator
            ->numeric('diferencia_usd')
            ->allowEmpty('diferencia_usd');

        $validator
            ->numeric('cobro_tc_clp')
            ->allowEmpty('cobro_tc_clp');

        $validator
            ->numeric('cobro_tc_usd')
            ->allowEmpty('cobro_tc_usd');

        $validator
            ->allowEmpty('descuento_clp');

        $validator
            ->allowEmpty('descuento_usd');

        $validator
            ->numeric('cargo_tc_clp')
            ->allowEmpty('cargo_tc_clp');

        $validator
            ->numeric('cargo_tc_usd')
            ->allowEmpty('cargo_tc_usd');

        $validator
            ->numeric('cargo_remesa_clp')
            ->allowEmpty('cargo_remesa_clp');

        $validator
            ->numeric('cargo_remesa_usd')
            ->allowEmpty('cargo_remesa_usd');

        $validator
            ->numeric('utilidad_final_clp')
            ->allowEmpty('utilidad_final_clp');

        $validator
            ->numeric('utilidad_final_usd')
            ->allowEmpty('utilidad_final_usd');

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
        $rules->add($rules->existsIn(['ficha_negocio_id'], 'FichaNegocios'));

        return $rules;
    }
}
