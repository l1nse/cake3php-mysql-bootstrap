<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Regiones Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Paises
 * @property \Cake\ORM\Association\HasMany $Ciudades
 * @property \Cake\ORM\Association\HasMany $Despachos
 *
 * @method \App\Model\Entity\Regione get($primaryKey, $options = [])
 * @method \App\Model\Entity\Regione newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Regione[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Regione|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Regione patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Regione[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Regione findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RegionesTable extends Table
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

        $this->setTable('regiones');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Paises', [
            'foreignKey' => 'paise_id'
        ]);
        $this->hasMany('Ciudades', [
            'foreignKey' => 'regione_id'
        ]);
        $this->hasMany('Despachos', [
            'foreignKey' => 'regione_id'
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
        $rules->add($rules->existsIn(['paise_id'], 'Paises'));

        return $rules;
    }
}
