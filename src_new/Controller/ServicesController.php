<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;
/**
 * Events and Offer Controller
 *
 * @property \App\Model\Table\PagesTable $Pages
 */
class ServicesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function psdToHtml()
    {
        $this->set('title','PSD TO HTML');
    }
    
    public function psdToWordpress()
    {
        $this->set('title','PSD TO Wordpress');
    }
    public function psdToEmail()
    {
        $this->set('title','PSD TO Email');
    }
    public function customDevelopment()
    {
        $this->set('title','Custom Development');
    }
}
