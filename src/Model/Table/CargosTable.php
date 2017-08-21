<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cargos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Areas
 * @property \Cake\ORM\Association\HasMany $FichaPersonales
 *
 * @method \App\Model\Entity\Cargo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Cargo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Cargo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Cargo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cargo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Cargo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Cargo findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CargosTable extends Table
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

        $this->setTable('cargos');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Areas', [
            'foreignKey' => 'area_id'
        ]);
        $this->hasMany('FichaPersonales', [
            'foreignKey' => 'cargo_id'
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
        $rules->add($rules->existsIn(['area_id'], 'Areas'));

        return $rules;
    }
}
