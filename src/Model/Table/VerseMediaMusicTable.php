<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VerseMediaMusic Model
 *
 * @method \App\Model\Entity\VerseMediaMusic get($primaryKey, $options = [])
 * @method \App\Model\Entity\VerseMediaMusic newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VerseMediaMusic[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VerseMediaMusic|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VerseMediaMusic patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VerseMediaMusic[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VerseMediaMusic findOrCreate($search, callable $callback = null, $options = [])
 */
class VerseMediaMusic extends Table
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

        $this->table('verse_media_music');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('BibleBookVerse', [
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
            ->integer('id_of_verse')
            ->allowEmpty('id_of_verse');

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
        $rules->add($rules->existsIn(['id'], 'BibleBookVerse'));

        return $rules;
    }

    /**
     * @param $versesMedia
     * @param $id_of_verse
     * 
     * save ids of verse according to saved sermon
     */
    public function saveVerseMedia($versesMedia, $id_of_verse){
        foreach ($versesMedia as $verseMedia){
            $ver = $this->newEntity();
            $ver->id_of_verse = $id_of_verse;
            $result = $this->save($ver);
        }
    }
}
