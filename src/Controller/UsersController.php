<?php
namespace App\Controller;
//namespace App\Controller;


use Cake\Core\Configure;

/**
 * Class AdminController
 * @package App\Controller\Admin
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController {

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
        $user = $this->Users->newEntity();
        if($this->request->is('post')){
            $data = $this->request->data;
            $user = $this->Users->patchEntity($user, $data);
            if($this->Users->save($user)){
                $this->Flash->success("You are registered! You can login");
                $this->redirect(['controller' => 'Users', 'action' => 'login']);
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
                return $this->redirect('/dashboard');
            } else {
                $this->Flash->set('This is a message');
//                    $this->Flash->set(__('Username or password is incorrect'), [
//                    ]);
//                return $this->redirect('admin/Admin/login');
            }
        }
    }

    public function dashboard(){
        
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
}
