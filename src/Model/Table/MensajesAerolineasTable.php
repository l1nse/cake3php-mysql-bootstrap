<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MensajesAerolineas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Reemisiones
 *
 * @method \App\Model\Entity\MensajesAerolinea get($primaryKey, $options = [])
 * @method \App\Model\Entity\MensajesAerolinea newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MensajesAerolinea[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MensajesAerolinea|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MensajesAerolinea patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MensajesAerolinea[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MensajesAerolinea findOrCreate($search, callable $callback = null, $options = [])
 */
class MensajesAerolineasTable extends Table
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

        $this->setTable('mensajes_aerolineas');
        $this->setDisplayField('ID');
        $this->setPrimaryKey('ID');

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
            ->integer('ID')
            ->allowEmpty('ID', 'create');

        $validator
            ->allowEmpty('SSR');

        $validator
            ->allowEmpty('Mensaje');

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
