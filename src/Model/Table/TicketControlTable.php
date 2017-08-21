<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TicketControl Model
 *
 * @method \App\Model\Entity\TicketControl get($primaryKey, $options = [])
 * @method \App\Model\Entity\TicketControl newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TicketControl[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TicketControl|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TicketControl patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TicketControl[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TicketControl findOrCreate($search, callable $callback = null, $options = [])
 */
class TicketControlTable extends Table
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

        $this->setTable('ticket_control');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->allowEmpty('placa');

        $validator
            ->allowEmpty('linea_aerea');

        $validator
            ->allowEmpty('ticket');

        $validator
            ->allowEmpty('moneda');

        $validator
            ->allowEmpty('emision_tkt');

        $validator
            ->allowEmpty('ficha');

        $validator
            ->allowEmpty('factura');

        $validator
            ->allowEmpty('empresa');

        $validator
            ->allowEmpty('apellido');

        $validator
            ->allowEmpty('nombre');

        $validator
            ->allowEmpty('ruta');

        $validator
            ->allowEmpty('pais');

        $validator
            ->allowEmpty('continente');

        $validator
            ->allowEmpty('itinerario');

        $validator
            ->allowEmpty('vendedor');

        $validator
            ->allowEmpty('observaciones_1');

        $validator
            ->allowEmpty('tkt_usd_1');

        $validator
            ->allowEmpty('tkt_clp_1');

        $validator
            ->allowEmpty('tax_usd_1');

        $validator
            ->allowEmpty('tax_clp_1');

        $validator
            ->allowEmpty('tkt_usd_2');

        $validator
            ->allowEmpty('tkt_clp_2');

        $validator
            ->allowEmpty('tax_usd_2');

        $validator
            ->allowEmpty('tax_clp_2');

        $validator
            ->allowEmpty('normal');

        $validator
            ->allowEmpty('over');

        $validator
            ->allowEmpty('dolares_1');

        $validator
            ->allowEmpty('pesos_1');

        $validator
            ->allowEmpty('dolares_2');

        $validator
            ->allowEmpty('pesos_2');

        $validator
            ->allowEmpty('dolares_3');

        $validator
            ->allowEmpty('pesos_3');

        $validator
            ->allowEmpty('observaciones_2');

        $validator
            ->allowEmpty('total_usd');

        $validator
            ->allowEmpty('total_clp');

        $validator
            ->allowEmpty('utilidad_usd');

        $validator
            ->allowEmpty('utilidad_clp');

        $validator
            ->allowEmpty('com_usd');

        $validator
            ->allowEmpty('com_clp');

        $validator
            ->allowEmpty('over_usd');

        $validator
            ->allowEmpty('over_clp');

        return $validator;
    }
}
