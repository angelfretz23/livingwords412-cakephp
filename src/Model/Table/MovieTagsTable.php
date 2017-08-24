<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MovieTags Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Movies
 *
 * @method \App\Model\Entity\MovieTag get($primaryKey, $options = [])
 * @method \App\Model\Entity\MovieTag newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MovieTag[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MovieTag|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MovieTag patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MovieTag[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MovieTag findOrCreate($search, callable $callback = null, $options = [])
 */
class MovieTagsTable extends Table
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

        $this->table('movie_tags');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Movie', [
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
        $rules->add($rules->existsIn(['movie_id'], 'Movie'));

        return $rules;
    }

    public function saveTags($tags, $movieId)
    {
        foreach ($tags as $tag){
            $tagS = $this->newEntity();
            $tagS->tag_name = $tag;
            $tagS->movie_id = $movieId;
            $result = $this->save($tagS);
        }
    }
}
