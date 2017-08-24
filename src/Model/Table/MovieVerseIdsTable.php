<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MovieVerseIds Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Movies
 *
 * @method \App\Model\Entity\MovieVerseId get($primaryKey, $options = [])
 * @method \App\Model\Entity\MovieVerseId newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MovieVerseId[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MovieVerseId|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MovieVerseId patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MovieVerseId[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MovieVerseId findOrCreate($search, callable $callback = null, $options = [])
 */
class MovieVerseIdsTable extends Table
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

        $this->table('movie_verse_ids');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Movie', [
            'foreignKey' => 'id'
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
//        $rules->add($rules->existsIn(['movie_id'], 'Movie'));

        return $rules;
    }

    public function saveMovieVerseIds($movieVerseArr, $movieId)
    {
        foreach ($movieVerseArr as $movArr){
            $movA = $this->newEntity();
            $movA->verse_id_each = $movArr;
            $movA->movie_id = $movieId;
            $result = $this->save($movA);
        }
    }
}
