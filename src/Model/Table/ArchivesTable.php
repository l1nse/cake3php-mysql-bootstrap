<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Archives Model
 *
 * @property \Cake\ORM\Association\HasMany $GestioneArchives
 * @property \Cake\ORM\Association\HasMany $TicketArchives
 *
 * @method \App\Model\Entity\Archive get($primaryKey, $options = [])
 * @method \App\Model\Entity\Archive newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Archive[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Archive|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Archive patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Archive[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Archive findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ArchivesTable extends Table
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

        $this->setTable('archives');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('GestioneArchives', [
            'foreignKey' => 'archive_id'
        ]);
        $this->hasMany('TicketArchives', [
            'foreignKey' => 'archive_id'
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
            ->allowEmpty('url');

        $validator
            ->integer('active')
            ->allowEmpty('active');

        return $validator;
    }
}
