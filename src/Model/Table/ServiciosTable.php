<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Servicios Model
 *
 * @property \Cake\ORM\Association\BelongsTo $FichaNegocios
 * @property \Cake\ORM\Association\BelongsTo $Proveedores
 * @property \Cake\ORM\Association\HasMany $FichaNegocioServicios
 *
 * @method \App\Model\Entity\Servicio get($primaryKey, $options = [])
 * @method \App\Model\Entity\Servicio newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Servicio[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Servicio|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Servicio patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Servicio[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Servicio findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ServiciosTable extends Table
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

        $this->setTable('servicios');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('FichaNegocios', [
            'foreignKey' => 'ficha_negocio_id'
        ]);
        $this->belongsTo('Proveedores', [
            'foreignKey' => 'proveedore_id'
        ]);
        $this->hasMany('FichaNegocioServicios', [
            'foreignKey' => 'servicio_id'
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
            ->allowEmpty('tipo_servicio');

        $validator
            ->allowEmpty('condicion_pago');

        $validator
            ->numeric('valor_neto')
            ->allowEmpty('valor_neto');

        $validator
            ->numeric('valor_neto_usd')
            ->allowEmpty('valor_neto_usd');

        $validator
            ->numeric('tax')
            ->allowEmpty('tax');

        $validator
            ->numeric('tax_usd')
            ->allowEmpty('tax_usd');

        $validator
            ->numeric('valor_neto_land')
            ->allowEmpty('valor_neto_land');

        $validator
            ->numeric('valor_neto_land_usd')
            ->allowEmpty('valor_neto_land_usd');

        $validator
            ->allowEmpty('iva_land_tipo');

        $validator
            ->allowEmpty('iva_land_pesos');

        $validator
            ->allowEmpty('iva_land_usd');

        $validator
            ->numeric('comag_procentaje')
            ->allowEmpty('comag_procentaje');

        $validator
            ->numeric('comag_pesos')
            ->allowEmpty('comag_pesos');

        $validator
            ->numeric('comag_usd')
            ->allowEmpty('comag_usd');

        $validator
            ->numeric('over_porcentaje')
            ->allowEmpty('over_porcentaje');

        $validator
            ->numeric('over_pesos')
            ->allowEmpty('over_pesos');

        $validator
            ->numeric('over_usd')
            ->allowEmpty('over_usd');

        $validator
            ->numeric('amex_porcentaje')
            ->allowEmpty('amex_porcentaje');

        $validator
            ->numeric('amex_pesos')
            ->allowEmpty('amex_pesos');

        $validator
            ->numeric('amex_usd')
            ->allowEmpty('amex_usd');

        $validator
            ->numeric('neto_comag_pesos')
            ->allowEmpty('neto_comag_pesos');

        $validator
            ->numeric('neto_comag_usd')
            ->allowEmpty('neto_comag_usd');

        $validator
            ->numeric('comag_iva_porcentaje')
            ->allowEmpty('comag_iva_porcentaje');

        $validator
            ->numeric('comag_iva_pesos')
            ->allowEmpty('comag_iva_pesos');

        $validator
            ->numeric('comag_iva_usd')
            ->allowEmpty('comag_iva_usd');

        $validator
            ->numeric('boleta_honorario_porcentaje')
            ->allowEmpty('boleta_honorario_porcentaje');

        $validator
            ->numeric('boleta_honorario_pesos')
            ->allowEmpty('boleta_honorario_pesos');

        $validator
            ->numeric('boleta_honorario_usd')
            ->allowEmpty('boleta_honorario_usd');

        $validator
            ->numeric('total_pesos')
            ->allowEmpty('total_pesos');

        $validator
            ->numeric('total_usd')
            ->allowEmpty('total_usd');

        $validator
            ->numeric('total_contabilidad_pesos')
            ->allowEmpty('total_contabilidad_pesos');

        $validator
            ->numeric('total_contabilidad_usd')
            ->allowEmpty('total_contabilidad_usd');

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
        $rules->add($rules->existsIn(['ficha_negocio_id'], 'FichaNegocios'));
        $rules->add($rules->existsIn(['proveedore_id'], 'Proveedores'));

        return $rules;
    }
}
