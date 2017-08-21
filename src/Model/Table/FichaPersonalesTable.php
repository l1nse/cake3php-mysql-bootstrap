<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FichaPersonales Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Empresas
 * @property \Cake\ORM\Association\BelongsTo $TipoMovimientos
 * @property \Cake\ORM\Association\BelongsTo $Areas
 * @property \Cake\ORM\Association\BelongsTo $Cargos
 * @property \Cake\ORM\Association\BelongsTo $Paises
 * @property \Cake\ORM\Association\BelongsTo $Ciudades
 * @property \Cake\ORM\Association\BelongsTo $Comunas
 * @property \Cake\ORM\Association\BelongsTo $TipoCuentas
 * @property \Cake\ORM\Association\BelongsTo $Bancos
 * @property \Cake\ORM\Association\BelongsTo $Afps
 * @property \Cake\ORM\Association\BelongsTo $Isapres
 * @property \Cake\ORM\Association\HasMany $JefeAreas
 *
 * @method \App\Model\Entity\FichaPersonale get($primaryKey, $options = [])
 * @method \App\Model\Entity\FichaPersonale newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\FichaPersonale[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FichaPersonale|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FichaPersonale patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FichaPersonale[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\FichaPersonale findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FichaPersonalesTable extends Table
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

        $this->setTable('ficha_personales');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsTo('Empresas', [
            'foreignKey' => 'empresa_id'
        ]);
        $this->belongsTo('TipoMovimientos', [
            'foreignKey' => 'tipo_movimiento_id'
        ]);
        $this->belongsTo('Areas', [
            'foreignKey' => 'area_id'
        ]);
        $this->belongsTo('Cargos', [
            'foreignKey' => 'cargo_id'
        ]);
        $this->belongsTo('Paises', [
            'foreignKey' => 'paise_id'
        ]);
        $this->belongsTo('Ciudades', [
            'foreignKey' => 'ciudade_id'
        ]);
        $this->belongsTo('Comunas', [
            'foreignKey' => 'comuna_id'
        ]);
        $this->belongsTo('TipoCuentas', [
            'foreignKey' => 'tipo_cuenta_id'
        ]);
        $this->belongsTo('Bancos', [
            'foreignKey' => 'banco_id'
        ]);
        $this->belongsTo('Afps', [
            'foreignKey' => 'afp_id'
        ]);
        $this->belongsTo('Isapres', [
            'foreignKey' => 'isapre_id'
        ]);
        $this->hasMany('JefeAreas', [
            'foreignKey' => 'ficha_personale_id'
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
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->date('fecha_nacimiento')
            ->allowEmpty('fecha_nacimiento');

        $validator
            ->integer('estado_civil')
            ->allowEmpty('estado_civil');

        $validator
            ->allowEmpty('direccion');

        $validator
            ->allowEmpty('telefono');

        $validator
            ->allowEmpty('celular');

        $validator
            ->allowEmpty('nombre_emergencia');

        $validator
            ->allowEmpty('telefono_emergencia');

        $validator
            ->allowEmpty('numero_cuenta');

        $validator
            ->numeric('apv')
            ->allowEmpty('apv');

        $validator
            ->numeric('ahorro_cta2')
            ->allowEmpty('ahorro_cta2');

        $validator
            ->numeric('valor_isapre')
            ->allowEmpty('valor_isapre');

        $validator
            ->integer('active')
            ->allowEmpty('active');
        $validator
            ->allowEmpty('rut');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['empresa_id'], 'Empresas'));
        $rules->add($rules->existsIn(['tipo_movimiento_id'], 'TipoMovimientos'));
        $rules->add($rules->existsIn(['area_id'], 'Areas'));
        $rules->add($rules->existsIn(['cargo_id'], 'Cargos'));
        $rules->add($rules->existsIn(['paise_id'], 'Paises'));
        $rules->add($rules->existsIn(['ciudade_id'], 'Ciudades'));
        $rules->add($rules->existsIn(['comuna_id'], 'Comunas'));
        $rules->add($rules->existsIn(['tipo_cuenta_id'], 'TipoCuentas'));
        $rules->add($rules->existsIn(['banco_id'], 'Bancos'));
        $rules->add($rules->existsIn(['afp_id'], 'Afps'));
        $rules->add($rules->existsIn(['isapre_id'], 'Isapres'));

        return $rules;
    }
}
