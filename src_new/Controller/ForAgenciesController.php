<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;
/**
 * Events and Offer Controller
 *
 * @property \App\Model\Table\PagesTable $Pages
 */
class ForAgenciesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->set('title','For Agencies');
        $this->loadModel('Agencies');
        $session = $this->request->session();
        $agencies = $this->Agencies->newEntity();
        if ($this->request->is('post')) {
            
            $agencies['user_name'] = $this->request->data['user_name'];
            $agencies['email'] = $this->request->data['email'];
            $agencies['website'] = $this->request->data['website'];
            $agencies['pro_per_month'] = $this->request->data['pro_per_month'];
            $agencies['message'] = $this->request->data['message'];
            $agencies['created_at'] = date("Y-m-d H:i:s");
            $agencies['modified_at'] = date("Y-m-d H:i:s");
            $agencies_id = "A".date("ymd").rand(100, 999);
            $agencies['agency_id'] = $agencies_id;
            if ($this->Agencies->save($agencies)) {
                $message = "<b>Id:</b>".$agencies['agency_id']."<br>";
                $message .= "<b>Name:</b>".$this->request->data['user_name']."<br>";
                $message .= "<b>Email:</b>".$this->request->data['email']."<br>";
                $message .= "<b>Website:</b>".$this->request->data['website']."<br>";
                $message .= "<b>Peojects Per Month:</b>".$this->request->data['pro_per_month']."<br>";
                $message .= "<b>Message:</b>".$this->request->data['message']."<br>";
                $message .= "<b>Created At:</b>".date("Y-m-d H:i:s")."<br>";
                $email = new Email();
                $email->from(['smtp@psd4html.com' => 'PSD4HTML'])
                    ->to('hello@psd4html.com')
                    ->subject('New Agency Request')
                    ->emailFormat('html')
                    ->send($message);
                $session->write('agencies.agencies_detail',$agencies);
                return $this->redirect(['action' => 'agencies-sucess']);
            }
        }
        $this->set(compact('agencies'));
        $this->set('_serialize', ['agencies']);
    }
    public function agenciesSucess() {
        $session = $this->request->session();
        if($session->read('agencies.agencies_detail')){
            $agencies = $session->read('agencies.agencies_detail');
        }else{
            return $this->redirect(['action' => 'index']);
        }
        $this->set(compact('agencies'));
        $this->set('_serialize', ['agencies']);
        $session->delete('agencies.agencies_detail');
    }
}
