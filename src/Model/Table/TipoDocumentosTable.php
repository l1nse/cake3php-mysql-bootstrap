<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TipoDocumentos Model
 *
 * @property \Cake\ORM\Association\HasMany $Despachos
 *
 * @method \App\Model\Entity\TipoDocumento get($primaryKey, $options = [])
 * @method \App\Model\Entity\TipoDocumento newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TipoDocumento[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TipoDocumento|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TipoDocumento patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TipoDocumento[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TipoDocumento findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TipoDocumentosTable extends Table
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

        $this->setTable('tipo_documentos');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Despachos', [
            'foreignKey' => 'tipo_documento_id'
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
