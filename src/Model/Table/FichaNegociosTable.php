<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FichaNegocios Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $FichaCotizaciones
 * @property \Cake\ORM\Association\BelongsTo $Vendedores
 * @property \Cake\ORM\Association\BelongsTo $Promotores
 * @property \Cake\ORM\Association\BelongsTo $Empresas
 * @property \Cake\ORM\Association\BelongsTo $Clientes
 * @property \Cake\ORM\Association\BelongsTo $ContactoClientes
 * @property \Cake\ORM\Association\BelongsTo $EstadoFichas
 * @property \Cake\ORM\Association\HasMany $FichaNegocioServicios
 * @property \Cake\ORM\Association\HasMany $Servicios
 * @property \Cake\ORM\Association\HasMany $Utilidades
 *
 * @method \App\Model\Entity\FichaNegocio get($primaryKey, $options = [])
 * @method \App\Model\Entity\FichaNegocio newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\FichaNegocio[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FichaNegocio|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FichaNegocio patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FichaNegocio[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\FichaNegocio findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FichaNegociosTable extends Table
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

        $this->setTable('ficha_negocios');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsTo('FichaCotizaciones', [
            'foreignKey' => 'ficha_cotizacione_id'
        ]);
        $this->belongsTo('Vendedores', [
            'foreignKey' => 'vendedore_id'
        ]);
        $this->belongsTo('Promotores', [
            'foreignKey' => 'promotore_id'
        ]);
        $this->belongsTo('Empresas', [
            'foreignKey' => 'empresa_id'
        ]);
        $this->belongsTo('Clientes', [
            'foreignKey' => 'cliente_id'
        ]);
        $this->belongsTo('ContactoClientes', [
            'foreignKey' => 'contacto_cliente_id'
        ]);
        $this->belongsTo('EstadoFichas', [
            'foreignKey' => 'estado_ficha_id'
        ]);
        $this->hasMany('FichaNegocioServicios', [
            'foreignKey' => 'ficha_negocio_id'
        ]);
        $this->hasMany('Servicios', [
            'foreignKey' => 'ficha_negocio_id'
        ]);
        $this->hasMany('Utilidades', [
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
            ->integer('folio_ficha')
            ->allowEmpty('folio_ficha');

        $validator
            ->integer('folio_factura')
            ->allowEmpty('folio_factura');

        $validator
            ->dateTime('fecha')
            ->allowEmpty('fecha');

        $validator
            ->allowEmpty('tipoCambio');

        $validator
            ->allowEmpty('free');

        $validator
            ->allowEmpty('cliente_rut');

        $validator
            ->allowEmpty('cliente_direccion');

        $validator
            ->allowEmpty('tipo_de_venta_land');

        $validator
            ->allowEmpty('giro');

        $validator
            ->allowEmpty('nombre_contacto');

        $validator
            ->integer('fono_contacto')
            ->allowEmpty('fono_contacto');

        $validator
            ->allowEmpty('email_contacto');

        $validator
            ->dateTime('fecha_pago')
            ->allowEmpty('fecha_pago');

        $validator
            ->integer('forma_pago')
            ->allowEmpty('forma_pago');

        $validator
            ->allowEmpty('forma_pago_soft');

        $validator
            ->numeric('valor_bruto_tkt_clp')
            ->allowEmpty('valor_bruto_tkt_clp');

        $validator
            ->numeric('valor_bruto_tkt_usd')
            ->allowEmpty('valor_bruto_tkt_usd');

        $validator
            ->numeric('valor_tax_clp')
            ->allowEmpty('valor_tax_clp');

        $validator
            ->numeric('valor_tax_usd')
            ->allowEmpty('valor_tax_usd');

        $validator
            ->numeric('valor_neto_land_clp')
            ->allowEmpty('valor_neto_land_clp');

        $validator
            ->numeric('valor_neto_land_usd')
            ->allowEmpty('valor_neto_land_usd');

        $validator
            ->numeric('iva_19__land_clp')
            ->allowEmpty('iva_19__land_clp');

        $validator
            ->numeric('iva_19__land_usd')
            ->allowEmpty('iva_19__land_usd');

        $validator
            ->numeric('fee_emisiom_clp')
            ->allowEmpty('fee_emisiom_clp');

        $validator
            ->numeric('fee_emisiom_usd')
            ->allowEmpty('fee_emisiom_usd');

        $validator
            ->numeric('iva_fee_clp')
            ->allowEmpty('iva_fee_clp');

        $validator
            ->numeric('iva_fee_usd')
            ->allowEmpty('iva_fee_usd');

        $validator
            ->numeric('diferencia_tarifa_clp')
            ->allowEmpty('diferencia_tarifa_clp');

        $validator
            ->numeric('diferencia_tarifa_usd')
            ->allowEmpty('diferencia_tarifa_usd');

        $validator
            ->numeric('cargo_tarifa_clp')
            ->allowEmpty('cargo_tarifa_clp');

        $validator
            ->numeric('cargo_tarifa_usd')
            ->allowEmpty('cargo_tarifa_usd');

        $validator
            ->numeric('descuento_clp')
            ->allowEmpty('descuento_clp');

        $validator
            ->numeric('descuento_usd')
            ->allowEmpty('descuento_usd');

        $validator
            ->numeric('total_clp')
            ->allowEmpty('total_clp');

        $validator
            ->numeric('total_usd')
            ->allowEmpty('total_usd');

        $validator
            ->integer('active')
            ->allowEmpty('active');

        $validator
            ->numeric('utilidad_bruto_clp')
            ->allowEmpty('utilidad_bruto_clp');

        $validator
            ->numeric('utilidad_bruto_usd')
            ->allowEmpty('utilidad_bruto_usd');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['ficha_cotizacione_id'], 'FichaCotizaciones'));
        $rules->add($rules->existsIn(['vendedore_id'], 'Vendedores'));
        $rules->add($rules->existsIn(['promotore_id'], 'Promotores'));
        $rules->add($rules->existsIn(['empresa_id'], 'Empresas'));
        $rules->add($rules->existsIn(['cliente_id'], 'Clientes'));
        $rules->add($rules->existsIn(['contacto_cliente_id'], 'ContactoClientes'));
        $rules->add($rules->existsIn(['estado_ficha_id'], 'EstadoFichas'));

        return $rules;
    }
}
