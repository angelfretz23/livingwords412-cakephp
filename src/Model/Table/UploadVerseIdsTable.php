<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UploadVerseIds Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Sermons
 *
 * @method \App\Model\Entity\UploadVerseId get($primaryKey, $options = [])
 * @method \App\Model\Entity\UploadVerseId newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\UploadVerseId[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UploadVerseId|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UploadVerseId patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UploadVerseId[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\UploadVerseId findOrCreate($search, callable $callback = null, $options = [])
 */
class UploadVerseIdsTable extends Table
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

        $this->table('upload_verse_ids');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Sermon', [
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
        $rules->add($rules->existsIn(['id'], 'Sermon'));

        return $rules;
    }

    /**
     * @param $verseIds
     * @param $sermonId
     * 
     * save ids of verse according to saved sermon
     */
    public function saveVerseId($verseIds, $sermonId){
        foreach ($verseIds as $verId){
            $ver = $this->newEntity();
            $ver->sermon_id = $sermonId;
            $ver->verse_id_each = $verId;
            $result = $this->save($ver);
            
        }
//        if($result){
//            return $result;
//        }
//        return false;
    }
}
