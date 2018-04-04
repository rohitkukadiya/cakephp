<?php

namespace App\Controller;



use App\Controller\AppController;

use Cake\Mailer\Email;

/**

 * Events and Offer Controller

 *

 * @property \App\Model\Table\PagesTable $Pages

 */

class ContactController extends AppController

{



    /**

     * Index method

     *

     * @return \Cake\Network\Response|null

     */

    public function index()

    {

        $this->set('title','Home');

        $contact = $this->Contact->newEntity();

        $session = $this->request->session();

        if ($this->request->is('post')) {

            $contact['user_name'] = $this->request->data['user_name'];

            $contact['email'] = $this->request->data['email'];

            $contact['subject'] = $this->request->data['subject'];

            $contact['message'] = $this->request->data['message'];

            $contact['created_at'] = date("Y-m-d H:i:s");

            $contact_id = "C".date("ymd").rand(100, 999);

            $contact['contact_id'] = $contact_id;

            

            if ($this->Contact->save($contact)) {

                $message = "<b>Id:</b>".$contact['contact_id']."<br>";

                $message .= "<b>Name:</b>".$this->request->data['user_name']."<br>";

                $message .= "<b>Email:</b>".$this->request->data['email']."<br>";

                $message .= "<b>Subject:</b>".$this->request->data['subject']."<br>";

                $message .= "<b>Message:</b>".$this->request->data['message']."<br>";

                $message .= "<b>Created At:</b>".date("Y-m-d H:i:s")."<br>";

                $email = new Email('default');

                $email->from(['smtp@psd4html.com' => 'PSD4HTML'])

                    ->to('hello@psd4html.com')

                    ->subject('New Contact Request')

                    ->emailFormat('html')

                    ->send($message);

                $session->write('contact.contact_detail',$contact);

                return $this->redirect(['action' => 'contact-sucess']);

                //$this->Flash->success(__('Message has been sent successfully'),'alert alert-success fade in');

            } else {

                $this->Flash->error(__('There could be error in save data. Please, try again.'));

            }

        }

        $this->set(compact('contact'));

        $this->set('_serialize', ['contact']);

    }

    

    public function contactSucess() {

        $session = $this->request->session();

        if($session->read('contact.contact_detail')){

            $contact = $session->read('contact.contact_detail');

        }else{

            return $this->redirect(['action' => 'index']);

        }

        $session->delete('contact.contact_detail');

        $this->set(compact('contact'));

        $this->set('_serialize', ['contact']);

        $session->delete('contact.contact_detail');

    }

}

