<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Comprobantes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $TipoItems
 *
 * @method \App\Model\Entity\Comprobante get($primaryKey, $options = [])
 * @method \App\Model\Entity\Comprobante newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Comprobante[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Comprobante|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Comprobante patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Comprobante[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Comprobante findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ComprobantesTable extends Table
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

        $this->setTable('comprobantes');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('TipoItems', [
            'foreignKey' => 'tipo_item_id'
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
            ->allowEmpty('numero_cuenta_ficha');

        $validator
            ->boolean('tipo_asiento')
            ->allowEmpty('tipo_asiento');

        $validator
            ->allowEmpty('glosa_ficha');

        $validator
            ->boolean('tipo_documento1_ficha')
            ->allowEmpty('tipo_documento1_ficha');

        $validator
            ->allowEmpty('tipo_documento2_ficha');

        $validator
            ->boolean('numero_documento_ficha')
            ->allowEmpty('numero_documento_ficha');

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
        $rules->add($rules->existsIn(['tipo_item_id'], 'TipoItems'));

        return $rules;
    }
}
