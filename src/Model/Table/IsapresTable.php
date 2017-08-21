<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Isapres Model
 *
 * @property \Cake\ORM\Association\HasMany $FichaPersonales
 *
 * @method \App\Model\Entity\Isapre get($primaryKey, $options = [])
 * @method \App\Model\Entity\Isapre newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Isapre[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Isapre|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Isapre patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Isapre[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Isapre findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class IsapresTable extends Table
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

        $this->setTable('isapres');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('FichaPersonales', [
            'foreignKey' => 'isapre_id'
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
}
