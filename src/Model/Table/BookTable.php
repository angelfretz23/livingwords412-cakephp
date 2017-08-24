<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Book Model
 *
 * @method \App\Model\Entity\Book get($primaryKey, $options = [])
 * @method \App\Model\Entity\Book newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Book[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Book|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Book patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Book[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Book findOrCreate($search, callable $callback = null, $options = [])
 */
class BookTable extends Table
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

        $this->table('book');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->hasMany('TagBookScripture', [
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
            ->allowEmpty('author_name');

        $validator
            ->allowEmpty('media_link');

        $validator
            ->allowEmpty('book_name');

        $validator
            ->allowEmpty('publish_date');

        $validator
            ->allowEmpty('summary');

        return $validator;
    }

    public function saveBook($data)
    {
        $book = $this->newEntity();
        $book->author_name = $data['author_name'];
        $book->media_link = $data['media_link'];
        $book->book_name = $data['book_name'];
        $book->publish_date = $data['publish_date'];
        $book->summary = $data['summary'];
        $book->user_id = $data['user_id'];
        $result = $this->save($book);
        
        if ($result){
            return $result;
        } return false;
    }

    public function getData($verse)
    {
        $movie = $this->find()
            ->matching('TagBookScripture', function ($q) use ($verse) {
                return $q->where(['TagBookScripture.verse_id_each' => $verse]);
            })->toArray();
        return $movie;
    }
}
