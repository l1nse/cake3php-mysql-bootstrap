<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ItemCotizaciones Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Cotizaciones
 * @property \Cake\ORM\Association\BelongsTo $TipoItems
 * @property \Cake\ORM\Association\BelongsTo $TipoCambios
 *
 * @method \App\Model\Entity\ItemCotizacione get($primaryKey, $options = [])
 * @method \App\Model\Entity\ItemCotizacione newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ItemCotizacione[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ItemCotizacione|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ItemCotizacione patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ItemCotizacione[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ItemCotizacione findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ItemCotizacionesTable extends Table
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

        $this->setTable('item_cotizaciones');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Cotizaciones', [
            'foreignKey' => 'cotizacione_id'
        ]);
        $this->belongsTo('TipoItems', [
            'foreignKey' => 'tipo_item_id'
        ]);
        $this->belongsTo('TipoCambios', [
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
            ->allowEmpty('descripcion');

        $validator
            ->numeric('valor')
            ->allowEmpty('valor');

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
        $rules->add($rules->existsIn(['cotizacione_id'], 'Cotizaciones'));
        $rules->add($rules->existsIn(['tipo_item_id'], 'TipoItems'));
        $rules->add($rules->existsIn(['tipo_cambio_id'], 'TipoCambios'));

        return $rules;
    }
}
