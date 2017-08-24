<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\Cache\Cache;
use Cake\Datasource\EntityInterface;
use Cake\Event\Event;
use Cake\I18n\Time;
use Cake\Collection\Collection;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Filesystem\Folder;

/**
 * Users Model
 *
 */
class UsersTable extends Table
{
    /**
     * Fields for select from users table
     *
     * @var array
     */
    private $user_fields = [
        'id',
        'nickname',
        'user_photo',
        'access_token'
    ];


    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     *
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('users');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     *
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

//        $validator
//            ->requirePresence('nickname', 'create')
//            ->notEmpty('nickname');
//
        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');

//        $validator
//            ->requirePresence('fullname', 'create')
//            ->notEmpty('fullname');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     *
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
//        $rules->add($rules->isUnique(['email']));
//        $rules->add($rules->isUnique(['nickname']));

        return $rules;
    }

    /**
     * BeforeSave Event is fired before each entity is saved
     *
     * @param Event $event
     * @param EntityInterface $entity
     */
    public function beforeSave(Event $event, EntityInterface $entity)
    {
        if ($entity->isNew()) {
            $hash = hash('sha256', Time::now());
            $entity->access_token = $hash;
        }
    }

    /**
     * AfterSave event is fired after the transaction in which the save operation is wrapped has been committed.
     *
     * @param Event $event
     * @param EntityInterface $entity
     * @return bool
     */
    public function afterSave(Event $event, EntityInterface $entity)
    {
        if ($entity->isNew()) {
            Cache::write('user_' . $entity->access_token, $entity);
            return true;
        }
        Cache::write('user_' . $entity->id, $entity);
    }


    /**
     * Register new user
     *
     * @param $data
     *
     * @return object
     */
    public function registration($data)
    {
        $user = $this->newEntity($data);
        if (!$this->save($user)) {
            return $user->errors();
        }
        $token = $user->access_token;
        $user = $user->toArray();
        $user['access_token'] = $token;

        return (object)$user;
    }

    /**
     * Authentication for existing users
     *
     * @param $data
     *
     * @return object
     */
    public function auth($data)
    {
        $user = $this->find()
            ->select(['id','email','password', 'access_token','phone', 'banned','content_type'])
            ->where(['email' => $data['email']])
            ->first();
        if ($user && $this->checkPassword($data['password'], $user->password)) {
            if($user['banned'] == 0) {
                //for display token, private_account and notifications in response
                $token = $user->access_token;

                $user = $user->toArray();
                $user['access_token'] = $token;

                return (object)$user;
            }
        }
    }

    /**
     * Get some information about user with list of his video
     *
     * @param $id
     * @return mixed
     */
    public function getUserInfo($id)
    {
        return $this->findById($id)
            ->select($this->user_fields)
            ->toArray();
    }

    /**
     * Check if user exist and return info about him
     *  social type:
     *  1 - facebook
     *  2 - twitter
     *  3 - google plus
     *
     * @param $social_type
     * @param $social_id
     * @param $name
     * @return mixed
     */
    public function checkSocial($social_type, $social_id)
    {
        $socials = [
            1 => 'fb_id',
            2 => 'gp_id'
        ];
        $social = $socials[$social_type];

        return $this->find()
            ->where([
                $social => $social_id,
                //'nickname' => $name,
            ])
            ->select([
                'id',
                'email',
                'access_token',
            ])
            ->first();
    }

    /**
     * Check if current email exist
     *
     * @param $nickname
     * @return bool
     */
    public function checkEmail($email)
    {
        return $this->find()
            ->where(['email' => $email])
            ->first();
    }

    /**
     * Return some information about user without videos
     *
     * @param $id
     * @return mixed
     */
    public function getInfo($id)
    {
        return $this->findById($id)
            ->select([
                'id',
                'email'
            ])
            ->first();
    }

    /**
     * Find user by email for reset password
     *
     * @param $email
     * @return mixed
     */
    public function findUser($email)
    {
        return $this->findByEmail($email)
            ->first();
    }

    /**
     * Checking password of user
     *
     * @param $password
     * @param $hashed
     *
     * @return bool
     */
    private function checkPassword($password, $hashed)
    {
        return (new DefaultPasswordHasher())->check($password, $hashed);
    }

    /**
     * Get keys of array from object
     *
     * @param $records
     * @param $key
     * @return array
     */
    public function prepareUsersKeys($records, $key)
    {
        $arr = [];
        foreach ($records as $record) {
            $arr[] = $record->{$key}->id;
        }
        return $arr;
    }

    /**
     * get user in web
     */

    public function findUserWeb($data){
        $user = $this->find()
            ->where(['nickname' => $data['login']])
            ->first();
        var_dump((new DefaultPasswordHasher)->hash($data['pass']));die();
    }

    /**
     * @param $email
     * @return mixed
     *
     * check if email exist in database
     */
    public function checkUserEmail($email){
        return $this->findByEmail($email)
            ->first();
    }
}
