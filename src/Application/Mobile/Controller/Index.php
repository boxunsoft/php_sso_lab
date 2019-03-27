<?php
/**
 * Created by PhpStorm.
 * User: Jordy
 * Date: 2019/3/27
 * Time: 11:32 AM
 */

namespace Ala\Application\Mobile\Controller;

use Ala\Application\Mobile\Controller;

class Index extends Controller
{
    public function main()
    {
        $this->view->render();
    }
}