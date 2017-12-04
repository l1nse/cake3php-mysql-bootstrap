<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Calendarios Model
 *
 * @property \Cake\ORM\Association\HasMany $CalendariosAsistentes
 * @property \Cake\ORM\Association\BelongsToMany $Contactos
 *
 * @method \App\Model\Entity\Calendario get($primaryKey, $options = [])
 * @method \App\Model\Entity\Calendario newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Calendario[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Calendario|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Calendario patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Calendario[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Calendario findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CalendariosTable extends Table
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

        $this->setTable('calendarios');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('CalendariosAsistentes', [
            'foreignKey' => 'calendario_id'
        ]);
        $this->belongsToMany('Contactos', [
            'foreignKey' => 'calendario_id',
            'targetForeignKey' => 'contacto_id',
            'joinTable' => 'calendarios_contactos'
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
            ->allowEmpty('titulo');

        $validator
            ->allowEmpty('descripcion');

        $validator
            ->dateTime('date_time')
            ->allowEmpty('date_time');

        $validator
            ->allowEmpty('address');

        $validator
            ->integer('active')
            ->allowEmpty('active');

        $validator
            ->integer('tipo_calendario')
            ->allowEmpty('tipo_calendario');

        $validator
            ->allowEmpty('observacion');

        return $validator;
    }
}
