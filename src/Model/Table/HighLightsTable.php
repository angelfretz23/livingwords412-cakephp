<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * HighLights Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Verses
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\HighLight get($primaryKey, $options = [])
 * @method \App\Model\Entity\HighLight newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\HighLight[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\HighLight|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\HighLight patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\HighLight[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\HighLight findOrCreate($search, callable $callback = null, $options = [])
 */
class HighLightsTable extends Table
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

        $this->table('high_lights');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);

        $this->belongsTo('BibleBookVerse', [
            'foreignKey' => 'verse_id'
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
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
//        $rules->add($rules->existsIn(['verse_id'], 'Verses'));
//        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
    
    public function saveHighlight($data)
    {
        $hiLi = $this->newEntity();
        $hiLi->user_id = $data['user_id'];
        $hiLi->verse_id = $data['verse_id'];
        $result = $this->save($hiLi);
        if ($result){
            return $result;
        }   return false;
    }
}
