<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CalendariosContactos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Contactos
 * @property \Cake\ORM\Association\BelongsTo $Calendarios
 *
 * @method \App\Model\Entity\CalendariosContacto get($primaryKey, $options = [])
 * @method \App\Model\Entity\CalendariosContacto newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CalendariosContacto[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CalendariosContacto|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CalendariosContacto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CalendariosContacto[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CalendariosContacto findOrCreate($search, callable $callback = null, $options = [])
 */
class CalendariosContactosTable extends Table
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

        $this->setTable('calendarios_contactos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Contactos', [
            'foreignKey' => 'contacto_id'
        ]);
        $this->belongsTo('Calendarios', [
            'foreignKey' => 'calendario_id'
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
        $rules->add($rules->existsIn(['contacto_id'], 'Contactos'));
        $rules->add($rules->existsIn(['calendario_id'], 'Calendarios'));

        return $rules;
    }
}
