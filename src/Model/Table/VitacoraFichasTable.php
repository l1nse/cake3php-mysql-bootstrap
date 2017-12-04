<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VitacoraFichas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $EstadoFichas
 * @property \Cake\ORM\Association\BelongsTo $FichaNegocios
 *
 * @method \App\Model\Entity\VitacoraFicha get($primaryKey, $options = [])
 * @method \App\Model\Entity\VitacoraFicha newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VitacoraFicha[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VitacoraFicha|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VitacoraFicha patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VitacoraFicha[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VitacoraFicha findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class VitacoraFichasTable extends Table
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

        $this->setTable('vitacora_fichas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('EstadoFichas', [
            'foreignKey' => 'estado_ficha_id'
        ]);
        $this->belongsTo('FichaNegocios', [
            'foreignKey' => 'ficha_negocio_id'
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
            ->allowEmpty('comentario');

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
        $rules->add($rules->existsIn(['estado_ficha_id'], 'EstadoFichas'));
        $rules->add($rules->existsIn(['ficha_negocio_id'], 'FichaNegocios'));

        return $rules;
    }
}
