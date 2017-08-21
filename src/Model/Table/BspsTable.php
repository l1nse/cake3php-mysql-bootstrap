<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Bsps Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Bsp get($primaryKey, $options = [])
 * @method \App\Model\Entity\Bsp newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Bsp[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Bsp|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Bsp patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Bsp[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Bsp findOrCreate($search, callable $callback = null, $options = [])
 */
class BspsTable extends Table
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

        $this->setTable('bsps');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
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
            ->allowEmpty('document');

        $validator
            ->allowEmpty('cd');

        $validator
            ->allowEmpty('type_document');

        $validator
            ->allowEmpty('agent_code');

        $validator
            ->allowEmpty('billing_period');

        $validator
            ->allowEmpty('conjuntion');

        $validator
            ->allowEmpty('refunden');

        $validator
            ->allowEmpty('related');

        $validator
            ->allowEmpty('cpns');

        $validator
            ->allowEmpty('nr');

        $validator
            ->allowEmpty('airline_code');

        $validator
            ->allowEmpty('issue_date');

        $validator
            ->allowEmpty('int_dom');

        $validator
            ->allowEmpty('currency');

        $validator
            ->allowEmpty('gross_fare_cash');

        $validator
            ->allowEmpty('tax_cash');

        $validator
            ->allowEmpty('gross_fare_credit');

        $validator
            ->allowEmpty('tax_credit');

        $validator
            ->allowEmpty('std_comm_rate');

        $validator
            ->allowEmpty('std_comm_amount');

        $validator
            ->allowEmpty('suppl_comm_amount');

        $validator
            ->allowEmpty('vat_on_comm');

        $validator
            ->allowEmpty('penalties');

        $validator
            ->allowEmpty('net_to_be_paid');

        $validator
            ->allowEmpty('credit_card');

        $validator
            ->integer('year')
            ->allowEmpty('year');

        $validator
            ->integer('month')
            ->allowEmpty('month');

        $validator
            ->integer('week')
            ->allowEmpty('week');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
