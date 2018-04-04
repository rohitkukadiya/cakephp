<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;
/**
 * Events and Offer Controller
 *
 * @property \App\Model\Table\PagesTable $Pages
 */
class TermsAndConditionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->set('title','Sample');
    }
}
