<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Permisos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Roles
 * @property \Cake\ORM\Association\BelongsToMany $Roles
 *
 * @method \App\Model\Entity\Permiso get($primaryKey, $options = [])
 * @method \App\Model\Entity\Permiso newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Permiso[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Permiso|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Permiso patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Permiso[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Permiso findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PermisosTable extends Table
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

        $this->setTable('permisos');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id'
        ]);
        $this->belongsToMany('Roles', [
            'foreignKey' => 'permiso_id',
            'targetForeignKey' => 'role_id',
            'joinTable' => 'roles_permisos'
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
            ->allowEmpty('controlador');

        $validator
            ->allowEmpty('action');

        $validator
            ->integer('parametro')
            ->allowEmpty('parametro');

        $validator
            ->allowEmpty('descripcion');

        $validator
            ->integer('nivel')
            ->allowEmpty('nivel');

        $validator
            ->integer('padre')
            ->allowEmpty('padre');

        $validator
            ->integer('position')
            ->allowEmpty('position');

        $validator
            ->integer('menu')
            ->allowEmpty('menu');

        $validator
            ->allowEmpty('active');

        $validator
            ->allowEmpty('icono');

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

        return $rules;
    }
}
