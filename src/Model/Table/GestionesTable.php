<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Gestiones Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Tickets
 * @property \Cake\ORM\Association\HasMany $GestioneArchives
 *
 * @method \App\Model\Entity\Gestione get($primaryKey, $options = [])
 * @method \App\Model\Entity\Gestione newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Gestione[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Gestione|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Gestione patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Gestione[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Gestione findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class GestionesTable extends Table
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

        $this->setTable('gestiones');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Tickets', [
            'foreignKey' => 'ticket_id'
        ]);
        $this->hasMany('GestioneArchives', [
            'foreignKey' => 'gestione_id'
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
            ->allowEmpty('comentarios');

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
        $rules->add($rules->existsIn(['ticket_id'], 'Tickets'));

        return $rules;
    }
}
