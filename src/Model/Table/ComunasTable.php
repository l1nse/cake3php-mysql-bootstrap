<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Comunas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Ciudades
 * @property \Cake\ORM\Association\HasMany $FichaPersonales
 *
 * @method \App\Model\Entity\Comuna get($primaryKey, $options = [])
 * @method \App\Model\Entity\Comuna newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Comuna[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Comuna|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Comuna patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Comuna[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Comuna findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ComunasTable extends Table
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

        $this->setTable('comunas');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Ciudades', [
            'foreignKey' => 'ciudade_id'
        ]);
        $this->hasMany('FichaPersonales', [
            'foreignKey' => 'comuna_id'
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
        $rules->add($rules->existsIn(['ciudade_id'], 'Ciudades'));

        return $rules;
    }
}
