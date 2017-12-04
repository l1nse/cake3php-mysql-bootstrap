<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Reemisiones Model
 *
 * @property \Cake\ORM\Association\HasMany $DetallesTikets
 * @property \Cake\ORM\Association\HasMany $MensajesAerolineas
 *
 * @method \App\Model\Entity\Reemisione get($primaryKey, $options = [])
 * @method \App\Model\Entity\Reemisione newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Reemisione[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Reemisione|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Reemisione patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Reemisione[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Reemisione findOrCreate($search, callable $callback = null, $options = [])
 */
class ReemisionesTable extends Table
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

        $this->setTable('reemisiones');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('DetallesTikets', [
            'foreignKey' => 'reemisione_id'
        ]);
        $this->hasMany('MensajesAerolineas', [
            'foreignKey' => 'reemisione_id'
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
            ->allowEmpty('AMD');

        $validator
            ->allowEmpty('A');

        $validator
            ->allowEmpty('K');

        $validator
            ->allowEmpty('M');

        $validator
            ->allowEmpty('N');

        $validator
            ->allowEmpty('O');

        $validator
            ->allowEmpty('Q');

        $validator
            ->allowEmpty('I');

        $validator
            ->allowEmpty('T_K');

        $validator
            ->allowEmpty('F');

        $validator
            ->allowEmpty('FP');

        $validator
            ->allowEmpty('FVLA');

        $validator
            ->allowEmpty('FM');

        $validator
            ->allowEmpty('TK');

        $validator
            ->allowEmpty('AI');

        return $validator;
    }
}
