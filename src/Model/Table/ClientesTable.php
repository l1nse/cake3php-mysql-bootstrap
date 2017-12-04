<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Entidades Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Ciudades
 * @property \Cake\ORM\Association\BelongsTo $Comunas
 * @property \Cake\ORM\Association\BelongsTo $Paises
 * @property \Cake\ORM\Association\HasMany $Despachos
 *
 * @method \App\Model\Entity\Entidade get($primaryKey, $options = [])
 * @method \App\Model\Entity\Entidade newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Entidade[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Entidade|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Entidade patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Entidade[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Entidade findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ClientesTable extends Table
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

        $this->setTable('entidades');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Ciudades', [
            'foreignKey' => 'ciudade_id'
        ]);
        $this->belongsTo('Comunas', [
            'foreignKey' => 'comuna_id'
        ]);
        $this->belongsTo('Paises', [
            'foreignKey' => 'paise_id'
        ]);
        $this->hasMany('Despachos', [
            'foreignKey' => 'entidade_id'
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
            ->allowEmpty('giro');

        $validator
            ->allowEmpty('direccion');

        $validator
            ->allowEmpty('telefono');

        $validator
            ->allowEmpty('rut');

        $validator
            ->allowEmpty('rut_representante');

        $validator
            ->allowEmpty('name_representante');

        $validator
            ->allowEmpty('correo_representante');

        $validator
            ->integer('active')
            ->allowEmpty('active');

        $validator
            ->allowEmpty('role');

        $validator
            ->allowEmpty('tipo');

        $validator
            ->allowEmpty('codigo_softland');

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
        $rules->add($rules->isUnique(['rut']));

        $rules->add($rules->existsIn(['ciudade_id'], 'Ciudades'));
        $rules->add($rules->existsIn(['comuna_id'], 'Comunas'));
        $rules->add($rules->existsIn(['paise_id'], 'Paises'));

        return $rules;
    }
}
