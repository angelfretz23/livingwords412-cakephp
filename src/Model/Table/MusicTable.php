<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Music Model
 *
 * @method \App\Model\Entity\Music get($primaryKey, $options = [])
 * @method \App\Model\Entity\Music newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Music[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Music|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Music patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Music[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Music findOrCreate($search, callable $callback = null, $options = [])
 */
class MusicTable extends Table
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

        $this->table('music');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('TagScripture', [
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
            ->allowEmpty('artist_name');

        $validator
            ->allowEmpty('writer_name');

        $validator
            ->allowEmpty('music_link');

        $validator
            ->allowEmpty('song_story');

        $validator
            ->allowEmpty('description');

        return $validator;
    }

    /**
     * @param $data
     * @return \App\Model\Entity\Music|bool
     *
     * save music
     */
    public function saveMusic($data)
    {
        $music = $this->newEntity();
        $music->artist_name = $data['artist_name'];
        $music->writer_name = $data['writer_name'];
        $music->media_url = $data['music_link'];
        $music->song_story = $data['song_story'];
        $music->description = $data['descript'];
        $music->user_id = $data['user_id'];
        $result = $this->save($music);
        if ($result){
            return $result;
        }return false;
    }

    /**
     * @param $verse
     * @return array
     *
     * get data from table accordin to verse id
     */
    public function getData($verse)
    {
        $music = $this->find()
            ->matching('TagScripture', function ($q) use ($verse) {
                return $q->where(['TagScripture.id_of_verse' => $verse]);
            })->toArray();
        
        return $music;
    }
}