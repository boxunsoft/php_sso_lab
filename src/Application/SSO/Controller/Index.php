<?php
/**
 * Created by PhpStorm.
 * User: Jordy
 * Date: 2019/3/27
 * Time: 11:32 AM
 */

namespace Ala\Application\SSO\Controller;

use Ala\Application\SSO\Controller;

class Index extends Controller
{
    public function main()
    {
        $_SESSION['user_id'] = 10000;
        setcookie('a', 'AAAA', 0, '/', 'example3.com', false, false);
        setcookie('b', 'BBBB', 0, '/', '.example3.com', true, true);
        setcookie('c', 'CCCC', 0, '/', '.example3.com', false, true);
        $this->view->render();
    }
}