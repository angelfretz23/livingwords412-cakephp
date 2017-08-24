<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MusicTags Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Musics
 *
 * @method \App\Model\Entity\MusicTag get($primaryKey, $options = [])
 * @method \App\Model\Entity\MusicTag newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MusicTag[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MusicTag|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MusicTag patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MusicTag[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MusicTag findOrCreate($search, callable $callback = null, $options = [])
 */
class MusicTagsTable extends Table
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

        $this->table('music_tags');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Music', [
            'foreignKey' => 'music_id'
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
        $rules->add($rules->existsIn(['music_id'], 'Music'));

        return $rules;
    }
    
    public function saveMusicTags($musicTags, $musicId)
    {
        foreach ($musicTags as $musicTag){
            $mTag = $this->newEntity();
            $mTag->music_id = $musicId;
            $mTag->tag_name = $musicTag;
            $result = $this->save($mTag);
        }
    }
}
