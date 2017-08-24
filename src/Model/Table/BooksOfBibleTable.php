<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BooksOfBible Model
 *
 * @property \Cake\ORM\Association\BelongsTo $BibleTypes
 * @property \Cake\ORM\Association\HasMany $ChapterNumberOfBook
 *
 * @method \App\Model\Entity\BooksOfBible get($primaryKey, $options = [])
 * @method \App\Model\Entity\BooksOfBible newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\BooksOfBible[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BooksOfBible|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BooksOfBible patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BooksOfBible[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\BooksOfBible findOrCreate($search, callable $callback = null, $options = [])
 */
class BooksOfBibleTable extends Table
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

        $this->table('books_of_bible');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('BibleTypes', [
            'foreignKey' => 'bible_type_id'
        ]);
        $this->hasMany('ChapterNumberOfBook', [
            'foreignKey' => 'books_of_bible_id'
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
            ->allowEmpty('type');

        $validator
            ->allowEmpty('version');

        $validator
            ->allowEmpty('book_name');

        $validator
            ->allowEmpty('direction');

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
        $rules->add($rules->existsIn(['bible_type_id'], 'BibleTypes'));

        return $rules;
    }

    /**
     * @param $key
     * @return array
     *
     * books searching
     */
    public function getBookBible($key)
    {
       $work = $this->find()->select('book_name')->where(['book_name like'=> $key.'%'])->toArray();
        return $work;
    }
}
