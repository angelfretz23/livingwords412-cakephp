<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BookTags Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Books
 *
 * @method \App\Model\Entity\BookTag get($primaryKey, $options = [])
 * @method \App\Model\Entity\BookTag newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\BookTag[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BookTag|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BookTag patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BookTag[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\BookTag findOrCreate($search, callable $callback = null, $options = [])
 */
class BookTagsTable extends Table
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

        $this->table('book_tags');
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
            ->allowEmpty('tag_name');

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

    public function saveBookTags($bookTags, $bookId)
    {
        foreach ($bookTags as $bookTag){
           $book = $this->newEntity();
            $book->tag_name = $bookTag;
            $book->book_id = $bookId;
            $result = $this->save($book);
        }
    }
}
