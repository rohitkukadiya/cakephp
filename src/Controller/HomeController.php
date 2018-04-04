<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Events and Offer Controller
 *
 * @property \App\Model\Table\PagesTable $Pages
 */
class HomeController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $session = $this->request->session();
        if ($this->request->is('post')) {
            $session->write('Orderdetail.order_detail',$this->request->is('post'));
            return $this->redirect(['controller'=>'OrderNow','action' => 'index']);
        }
    }
}
