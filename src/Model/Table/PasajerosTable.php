<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pasajeros Model
 *
 * @method \App\Model\Entity\Pasajero get($primaryKey, $options = [])
 * @method \App\Model\Entity\Pasajero newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Pasajero[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pasajero|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pasajero patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Pasajero[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pasajero findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PasajerosTable extends Table
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

        $this->setTable('pasajeros');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->integer('numero_ticket')
            ->allowEmpty('numero_ticket');

        $validator
            ->allowEmpty('nombre1');

        $validator
            ->allowEmpty('nombre2');

        $validator
            ->allowEmpty('apellidop');

        $validator
            ->allowEmpty('apellidom');

        $validator
            ->allowEmpty('rut');

        $validator
            ->allowEmpty('nacionalidad');

        $validator
            ->allowEmpty('origen');

        $validator
            ->allowEmpty('destino');

        $validator
            ->allowEmpty('aerolinea');

        $validator
            ->allowEmpty('cod_pasasje');

        $validator
            ->allowEmpty('aeropuerto_origen');

        $validator
            ->allowEmpty('aeropuerto_destino');

        $validator
            ->dateTime('fecha_hora_salida')
            ->allowEmpty('fecha_hora_salida');

        $validator
            ->dateTime('fecha_hora_llegada')
            ->allowEmpty('fecha_hora_llegada');

        $validator
            ->integer('active')
            ->allowEmpty('active');

        return $validator;
    }
}
