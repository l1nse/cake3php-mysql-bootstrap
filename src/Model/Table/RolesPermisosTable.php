<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RolesPermisos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Rols
 * @property \Cake\ORM\Association\BelongsTo $Permisos
 *
 * @method \App\Model\Entity\RolesPermiso get($primaryKey, $options = [])
 * @method \App\Model\Entity\RolesPermiso newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RolesPermiso[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RolesPermiso|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RolesPermiso patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RolesPermiso[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RolesPermiso findOrCreate($search, callable $callback = null, $options = [])
 */
class RolesPermisosTable extends Table
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

        $this->setTable('roles_permisos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id'
        ]);
        $this->belongsTo('Permisos', [
            'foreignKey' => 'permiso_id'
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
        $rules->add($rules->existsIn(['role_id'], 'Roles'));
        $rules->add($rules->existsIn(['permiso_id'], 'Permisos'));

        return $rules;
    }
}
