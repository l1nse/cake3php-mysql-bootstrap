<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Despachos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Tickets
 * @property \Cake\ORM\Association\BelongsTo $Empresas
 * @property \Cake\ORM\Association\BelongsTo $Regiones
 * @property \Cake\ORM\Association\BelongsTo $Ciudades
 * @property \Cake\ORM\Association\BelongsTo $Comunas
 * @property \Cake\ORM\Association\BelongsTo $Entidades
 * @property \Cake\ORM\Association\BelongsTo $TipoDocumentos
 *
 * @method \App\Model\Entity\Despacho get($primaryKey, $options = [])
 * @method \App\Model\Entity\Despacho newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Despacho[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Despacho|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Despacho patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Despacho[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Despacho findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DespachosTable extends Table
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

        $this->setTable('despachos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Tickets', [
            'foreignKey' => 'ticket_id'
        ]);
        $this->belongsTo('Empresas', [
            'foreignKey' => 'empresa_id'
        ]);
        $this->belongsTo('Regiones', [
            'foreignKey' => 'regione_id'
        ]);
        $this->belongsTo('Ciudades', [
            'foreignKey' => 'ciudade_id'
        ]);
        $this->belongsTo('Comunas', [
            'foreignKey' => 'comuna_id'
        ]);
        $this->belongsTo('Entidades', [
            'foreignKey' => 'entidade_id'
        ]);
        $this->belongsTo('TipoDocumentos', [
            'foreignKey' => 'tipo_documento_id'
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
            ->integer('numero_documento')
            ->allowEmpty('numero_documento');

        $validator
            ->allowEmpty('direccion');

        $validator
            ->allowEmpty('horario');

        $validator
            ->dateTime('fecha_solicitud')
            ->allowEmpty('fecha_solicitud');

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
        $rules->add($rules->existsIn(['ticket_id'], 'Tickets'));
        $rules->add($rules->existsIn(['empresa_id'], 'Empresas'));
        $rules->add($rules->existsIn(['regione_id'], 'Regiones'));
        $rules->add($rules->existsIn(['ciudade_id'], 'Ciudades'));
        $rules->add($rules->existsIn(['comuna_id'], 'Comunas'));
        $rules->add($rules->existsIn(['entidade_id'], 'Entidades'));
        $rules->add($rules->existsIn(['tipo_documento_id'], 'TipoDocumentos'));

        return $rules;
    }
}
