<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;
/**
 * Events and Offer Controller
 *
 * @property \App\Model\Table\PagesTable $Pages
 */
class RequestFreeQuoteController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->loadModel('Quote');
        $this->set('title','Home');
        $quote = $this->Quote->newEntity();
        $session = $this->request->session();
        if ($this->request->is('post')) {
            $quote['instruction'] = $this->request->data['instruction'];
            $quote['files_url'] = $this->request->data['files_url'];
            $quote['budget_range'] = $this->request->data['budget_range'];
            $quote['user_name'] = $this->request->data['user_name'];
            $quote['email'] = $this->request->data['email'];
            $quote['created_at'] = date("Y-m-d H:i:s");
            $quote['updated_at'] = date("Y-m-d H:i:s");
            $quote_id = "Q".date("ymd").rand(100, 999);
            $quote['quote_id'] = $quote_id;
            $result = $this->Quote->save($quote);
            if ($result) {
                $email = new Email('default');
                $message = "<b>Id:</b>".$quote['quote_id']."<br>";
                $message .= "<b>Name:</b>".$this->request->data['user_name']."<br>";
                $message .= "<b>Email:</b>".$this->request->data['email']."<br>";
                $message .= "<b>Instrucation:</b>".$this->request->data['instruction']."<br>";
                $budget_range1 = "$".strstr($this->request->data['budget_range'], '-',true)."-";
                $budget_range2 = "$".  substr(strstr($this->request->data['budget_range'], '-',FALSE),'1');
                $budget_range = $budget_range1.$budget_range2;
                $message .= "<b>Budget Range:</b>".$budget_range."<br>";
                if($this->request->data['files_url'] != ""){
                    $message .= "<b>File Link:</b>".$this->request->data['files_url'];
                }
                $message .= "<b>Creation At:</b>".date("Y-m-d H:i:s")."<br>";
                
                $email->from(['smtp@psd4html.com' => 'PSD4HTML'])
                    ->to('hello@psd4html.com')
                    ->subject('New Quote Request')
                    ->emailFormat('html')
                    ->send($message);
                $session->write('quote.quote_detail',$quote);
                return $this->redirect(['action' => 'quote-sucess']);
                //$this->Flash->success(__('Quote inserted successfully'),'alert alert-success fade in');
            } else {
                $this->Flash->error(__('There could be error in save data. Please, try again.'));
            }
        }
        $this->set(compact('quote'));
        $this->set('_serialize', ['quote']);
    }
    
    public function quoteSucess() {
        $session = $this->request->session();
        if($session->read('quote.quote_detail')){
            $quote = $session->read('quote.quote_detail');
        }else{
            return $this->redirect(['action' => 'index']);
        }
        $session->delete('quote.quote_detail');
        $this->set(compact('quote'));
        $this->set('_serialize', ['quote']);
        $session->delete('quote.quote_detail');
    }
}
