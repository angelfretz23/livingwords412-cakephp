<?php
namespace App\Controller\Admin;
//namespace App\Controller;


use Cake\Core\Configure;

/**
 * Class AdminController
 * @package App\Controller\Admin
 * @property \App\Model\Table\UsersTable $Users
 * @property \App\Model\Table\AdministratorsTable $Administrators
 */
class AdminController extends AppController {

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Users');
        $this->loadModel('Administrators');

    }

    /**
     * @param \Cake\Event\Event $event
     *
     */
    public function beforeFilter(\Cake\Event\Event $event)
    {
        parent::beforeFilter($event);
//        if (!isset($$this->Auth)) {
//            debug(get_included_files());
//            die;
//        }
        $this->Auth->allow(['login', 'logout', 'register', 'index']);

    }

    /**
     * user register
     */
    public function register(){
        $user = $this->Administrators->newEntity();
        if($this->request->is('post')){
            $data = $this->request->data;
            $user = $this->Administrators->patchEntity($user, $data);
            if($this->Administrators->save($user)){
                $this->Flash->success("You are registered! You can login");
                $this->redirect(['controller' => 'Admin', 'action' => 'login']);
            }else{
                $this->Flash->error("Try again");
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }
    /**
     * @return \Cake\Network\Response|null
     *
     * administrator login method
     */
    public function login()
    {
            if ($this->request->is('post')) {
                
                $user = $this->Auth->identify();
                if ($user) {
                    $this->Auth->setUser($user);
                    return $this->redirect('admin/users/manage');
                } else {
                    $this->Flash->set('Nickname or password are incorrect');
//                    $this->Flash->set(__('Username or password is incorrect'), [
//                    ]);
                    return $this->redirect('admin/Admin/login');
                }
            }
        }

    public function dashboard(){
    }

    /**
     * @return \Cake\Network\Response|null
     *
     * logout action
     */
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function users()
    {
        $user = $this->Users->find()->toArray();
        $this->set('user', $user);
    }

    /**
     * ajax call check if user banned
     */
    public function ban()
    {
     $data = $this->request->data();

        $user = $this->Users->get($data['query']);

        if($user->banned == 0){
            $user->banned = 1;
        }else{
            $user->banned = 0;
        }
        $this->Users->save($user);
        die();
    }

    /**
     * ajax call check if user conten owner
     */
    public function contentOwner()
    {
        $data = $this->request->data();

        $user = $this->Users->get($data['query']);

        if($user->content_owner == 0){
            $user->content_owner = 1;
        }else{
            $user->content_owner = 0;
        }
        $this->Users->save($user);
        die();
    }
}
