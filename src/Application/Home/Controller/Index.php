<?php
/**
 * Created by PhpStorm.
 * User: Jordy
 * Date: 2019/3/27
 * Time: 11:32 AM
 */

namespace Ala\Application\Home\Controller;

use Ala\Application\Home\Controller;

class Index extends Controller
{
    public function main()
    {
        header("ORIGIN:");
        $this->view->render();
    }
}