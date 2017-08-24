<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sermon Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Tags
 *
 * @method \App\Model\Entity\Sermon get($primaryKey, $options = [])
 * @method \App\Model\Entity\Sermon newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Sermon[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Sermon|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sermon patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Sermon[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Sermon findOrCreate($search, callable $callback = null, $options = [])
 */
class SermonTable extends Table
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

        $this->table('sermon');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Tags', [
            'foreignKey' => 'sermon_id'
        ]);
        $this->hasMany('UploadVerseIds', [
            'foreignKey' => 'sermon_id'
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

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.T
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
//        $rules->add($rules->existsIn(['tag_id'], 'Tags'));

        return $rules;
    }

    /**
     * @param $data
     * @return \App\Model\Entity\Sermon|bool
     * 
     * save sarmon
     */
    public function saveSermon($data){
        $sermon = $this->newEntity();
        $sermon->pastor_name = $data['pastor_name'];
        $sermon->media_url = $data['media_url'];
        $sermon->semon_title = $data['sermon_title'];
        $sermon->sermon_date = $data['sermon_date'];
        $sermon->description = $data['descript'];
        $sermon->user_id = $data['user_id'];
        $savedSermon = $this->save($sermon);
        if ($savedSermon){
            return $savedSermon;
        }
        return false;
    }

    /**
     * @param $verse
     * @return array
     * 
     * get data accordion to verse id
     */
    public function getData($verse)
    {
        $sermon = $this->find()
            ->matching('UploadVerseIds', function ($q) use ($verse) {
                return $q->where(['UploadVerseIds.verse_id_each' => $verse]);
            })->toArray();
        return $sermon;
    }
}
