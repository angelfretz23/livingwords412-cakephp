<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Movie Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Movie get($primaryKey, $options = [])
 * @method \App\Model\Entity\Movie newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Movie[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Movie|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Movie patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Movie[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Movie findOrCreate($search, callable $callback = null, $options = [])
 */
class MovieTable extends Table
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

        $this->table('movie');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);

        $this->hasMany('MovieVerseIds', [
            'foreignKey' => 'movie_id'
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
            ->allowEmpty('director');

        $validator
            ->allowEmpty('actors');

        $validator
            ->allowEmpty('movie_link');

        $validator
            ->allowEmpty('movie_name');

        $validator
            ->allowEmpty('release_date');

        $validator
            ->allowEmpty('synoopsis');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
//    public function buildRules(RulesChecker $rules)
//    {
////        $rules->add($rules->existsIn(['user_id'], 'Users'));
//
//        return $rules;
//    }
    /**
     * @param $movieData
     * @return \App\Model\Entity\Movie|bool
     * 
     * save movie
     */
    public function saveMovie($movieData)
    {
//        var_dump($movieData['user_id']);
        $movie = $this->newEntity();
        $movie->director = $movieData['director'];
        $movie->actors = $movieData['actors'];
        $movie->movie_link = $movieData['movie_link'];
        $movie->movie_name = $movieData['movie_name'];
        $movie->release_date = $movieData['release_date'];
        $movie->synoopsis = $movieData['synoopsis'];
        $movie->user_id = $movieData['user_id'];
        $result = $this->save($movie);
        if ($result){
            return $result;
        }return false;

    }

    /**
     * @param $verse
     * @return array
     * 
     * get data accordion to verse id
     */
    public function getData($verse)
    {
        $movie = $this->find()
            ->matching('MovieVerseIds', function ($q) use ($verse) {
                return $q->where(['MovieVerseIds.verse_id_each' => $verse]);
            })->toArray();
        return $movie;
    }
}
