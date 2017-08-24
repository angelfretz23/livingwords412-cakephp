<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BibleType Model
 *
 * @property \Cake\ORM\Association\HasMany $BooksOfBible
 *
 * @method \App\Model\Entity\BibleType get($primaryKey, $options = [])
 * @method \App\Model\Entity\BibleType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\BibleType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BibleType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BibleType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BibleType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\BibleType findOrCreate($search, callable $callback = null, $options = [])
 */
class BibleTypeTable extends Table
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

        $this->table('bible_type');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->hasMany('BooksOfBible', [
            'foreignKey' => 'bible_type_id'
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

        return $validator;
    }
}
