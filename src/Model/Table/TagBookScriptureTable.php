<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TagBookScripture Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Books
 *
 * @method \App\Model\Entity\TagBookScripture get($primaryKey, $options = [])
 * @method \App\Model\Entity\TagBookScripture newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TagBookScripture[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TagBookScripture|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TagBookScripture patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TagBookScripture[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TagBookScripture findOrCreate($search, callable $callback = null, $options = [])
 */
class TagBookScriptureTable extends Table
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

        $this->table('tag_book_scripture');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Book', [
            'foreignKey' => 'book_id'
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
            ->integer('verse_id_each')
            ->allowEmpty('verse_id_each');

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
        $rules->add($rules->existsIn(['book_id'], 'Book'));

        return $rules;
    }

    public function saveTagBookScripture($tagBookScripture, $bookId)
    {
        foreach ($tagBookScripture as $tagS){
            $tagSc = $this->newEntity();
            $tagSc->verse_id_each = $tagS;
            $tagSc->book_id = $bookId;
            $result = $this->save($tagSc);
        }
    }
}
