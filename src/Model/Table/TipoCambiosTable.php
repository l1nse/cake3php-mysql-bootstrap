<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TipoCambios Model
 *
 * @property \Cake\ORM\Association\HasMany $ItemCotizaciones
 *
 * @method \App\Model\Entity\TipoCambio get($primaryKey, $options = [])
 * @method \App\Model\Entity\TipoCambio newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TipoCambio[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TipoCambio|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TipoCambio patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TipoCambio[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TipoCambio findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TipoCambiosTable extends Table
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

        $this->setTable('tipo_cambios');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('ItemCotizaciones', [
            'foreignKey' => 'tipo_cambio_id'
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
            ->integer('active')
            ->allowEmpty('active');

        return $validator;
    }
}
