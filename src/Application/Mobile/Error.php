<?php
/**
 * Created by PhpStorm.
 * User: Jordy
 * Date: 2019/3/27
 * Time: 11:32 AM
 */

namespace Ala\Application\Mobile;

class Error extends Controller
{
    public function main($e)
    {
        print_r($e);
        $this->response()->stop();
    }
}