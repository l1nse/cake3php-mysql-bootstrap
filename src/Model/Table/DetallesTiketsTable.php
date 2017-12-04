<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DetallesTikets Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Reemisiones
 *
 * @method \App\Model\Entity\DetallesTiket get($primaryKey, $options = [])
 * @method \App\Model\Entity\DetallesTiket newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DetallesTiket[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DetallesTiket|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DetallesTiket patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DetallesTiket[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DetallesTiket findOrCreate($search, callable $callback = null, $options = [])
 */
class DetallesTiketsTable extends Table
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

        $this->setTable('detalles_tikets');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Reemisiones', [
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
            ->allowEmpty('tiket');

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
        $rules->add($rules->existsIn(['reemisione_id'], 'Reemisiones'));

        return $rules;
    }
}
