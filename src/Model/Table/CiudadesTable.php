<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ciudades Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Regiones
 * @property \Cake\ORM\Association\HasMany $Comunas
 * @property \Cake\ORM\Association\HasMany $Despachos
 * @property \Cake\ORM\Association\HasMany $Entidades
 * @property \Cake\ORM\Association\HasMany $FichaPersonales
 *
 * @method \App\Model\Entity\Ciudade get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ciudade newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Ciudade[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ciudade|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ciudade patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ciudade[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ciudade findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CiudadesTable extends Table
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

        $this->setTable('ciudades');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Regiones', [
            'foreignKey' => 'regione_id'
        ]);
        $this->hasMany('Comunas', [
            'foreignKey' => 'ciudade_id'
        ]);
        $this->hasMany('Despachos', [
            'foreignKey' => 'ciudade_id'
        ]);
        $this->hasMany('Entidades', [
            'foreignKey' => 'ciudade_id'
        ]);
        $this->hasMany('FichaPersonales', [
            'foreignKey' => 'ciudade_id'
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
        $rules->add($rules->existsIn(['regione_id'], 'Regiones'));

        return $rules;
    }
}
