<?php
/**
 * Created by PhpStorm.
 * User: Jordy
 * Date: 2019/3/27
 * Time: 11:31 AM
 */
namespace Ala\Application\SSO;

use Alf\View;

class Controller extends \Alf\Controller {
    /**
     * @var View
     */
    protected $view;
    public function __construct()
    {
        parent::__construct();
        $this->view = View::getInstance();
    }
    public function before()
    {
        ini_set('session.save_handler', 'files');
        session_start();
        error_reporting(E_ALL);
        register_shutdown_function([$this, 'shutdownHandler']);
    }
    public function after()
    {
    }
    public function shutdownHandler()
    {
//        echo 'Controller::shutdownHandler()' . PHP_EOL;
    }
}