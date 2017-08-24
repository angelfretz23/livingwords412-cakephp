<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ChapterNumberOfBook Model
 *
 * @property \Cake\ORM\Association\BelongsTo $BooksOfBibles
 *
 * @method \App\Model\Entity\ChapterNumberOfBook get($primaryKey, $options = [])
 * @method \App\Model\Entity\ChapterNumberOfBook newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ChapterNumberOfBook[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ChapterNumberOfBook|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ChapterNumberOfBook patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ChapterNumberOfBook[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ChapterNumberOfBook findOrCreate($search, callable $callback = null, $options = [])
 */
class ChapterNumberOfBookTable extends Table
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

        $this->table('chapter_number_of_book');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('BooksOfBibles', [
            'foreignKey' => 'books_of_bible_id'
        ]);
        $this->hasMany('BibleBookVerse', [
            'foreignKey' => 'chapter_id'
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
            ->integer('chapter')
            ->allowEmpty('chapter');

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
        $rules->add($rules->existsIn(['books_of_bible_id'], 'BooksOfBibles'));

        return $rules;
    }
}
