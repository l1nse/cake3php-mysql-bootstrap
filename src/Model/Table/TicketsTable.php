<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tickets Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Sistemas
 * @property \Cake\ORM\Association\BelongsTo $SubSistemas
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $UserAsignados
 * @property \Cake\ORM\Association\HasMany $Despachos
 * @property \Cake\ORM\Association\HasMany $Gestiones
 * @property \Cake\ORM\Association\HasMany $TicketArchives
 *
 * @method \App\Model\Entity\Ticket get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ticket newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Ticket[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ticket|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ticket patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ticket[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ticket findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TicketsTable extends Table
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

        $this->setTable('tickets');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Sistemas', [
            'foreignKey' => 'sistema_id'
        ]);
        $this->belongsTo('SubSistemas', [
            'foreignKey' => 'sub_sistema_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsTo('UserAsignados', [
            'foreignKey' => 'user_asignado_id'
        ]);
        $this->hasMany('Despachos', [
            'foreignKey' => 'ticket_id'
        ]);
        $this->hasMany('Gestiones', [
            'foreignKey' => 'ticket_id'
        ]);
        $this->hasMany('TicketArchives', [
            'foreignKey' => 'ticket_id'
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
            ->integer('prioridad')
            ->allowEmpty('prioridad');

        $validator
            ->integer('tiempo_limite')
            ->allowEmpty('tiempo_limite');

        $validator
            ->allowEmpty('tiempo_tipo');

        $validator
            ->allowEmpty('asunto');

        $validator
            ->allowEmpty('descripcion');

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
        $rules->add($rules->existsIn(['sistema_id'], 'Sistemas'));
        $rules->add($rules->existsIn(['sub_sistema_id'], 'SubSistemas'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['user_asignado_id'], 'UserAsignados'));

        return $rules;
    }
}
