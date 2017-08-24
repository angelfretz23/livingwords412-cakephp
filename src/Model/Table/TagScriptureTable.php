<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TagScripture Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Musics
 *
 * @method \App\Model\Entity\TagScripture get($primaryKey, $options = [])
 * @method \App\Model\Entity\TagScripture newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TagScripture[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TagScripture|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TagScripture patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TagScripture[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TagScripture findOrCreate($search, callable $callback = null, $options = [])
 */
class TagScriptureTable extends Table
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

        $this->table('tag_scripture');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Music', [
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
            ->allowEmpty('tag_scripture_name');

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
        $rules->add($rules->existsIn(['music_id'], 'Music'));

        return $rules;
    }
    
    public function saveTagScripture($tagScriptures, $verseId)
    {
       //var_dump($tagScriptures);
//        var_dump($verseId);
        foreach ($tagScriptures as $tagScripture){
            $tFor = explode(':', $tagScripture);
//            var_dump($tFor);
            $sScripture = $this->newEntity();
            $sScripture->music_id = $verseId;
//            var_dump($tFor[0]);
//            foreach ($tFor as $tF) {

            $sScripture->tag_scripture_name = $tFor[1];
            $sScripture->id_of_verse = $tFor[0];
//            }
                $result = $this->save($sScripture);
        }

    }
}
