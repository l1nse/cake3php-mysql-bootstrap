<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * JefeAreas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Areas
 * @property \Cake\ORM\Association\BelongsTo $FichaPersonales
 *
 * @method \App\Model\Entity\JefeArea get($primaryKey, $options = [])
 * @method \App\Model\Entity\JefeArea newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\JefeArea[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\JefeArea|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\JefeArea patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\JefeArea[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\JefeArea findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class JefeAreasTable extends Table
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

        $this->setTable('jefe_areas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Areas', [
            'foreignKey' => 'area_id'
        ]);
        $this->belongsTo('FichaPersonales', [
            'foreignKey' => 'ficha_personale_id'
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
        $rules->add($rules->existsIn(['ficha_personale_id'], 'FichaPersonales'));

        return $rules;
    }
}
