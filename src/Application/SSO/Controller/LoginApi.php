<?php
/**
 * Created by PhpStorm.
 * User: Jordy
 * Date: 2019/3/27
 * Time: 3:24 PM
 */

namespace Ala\Application\SSO\Controller;

use Ala\Application\SSO\Controller;

class LoginApi extends Controller
{
    // 方案一
    public function main()
    {
        $response = [
            'session' => $_SESSION,
            'session_id' => session_id(),
            'cookie' => $_COOKIE,
            'server' => $_SERVER,
            'code' => 0
        ];

        session_set_cookie_params(3600, '/', '.devsso.testsso.com', true, true);

        ob_clean();
        header('Content-type:application/x-javascript');
        //指定JSON_PARTIAL_OUTPUT_ON_ERROR,避免$data中有非utf-8字符导致json编码返回false
        echo 'var v=' . json_encode($response, JSON_PARTIAL_OUTPUT_ON_ERROR) . ';';
    }

    // 方案二
    public function main2()
    {
        $response = [
            'session' => $_SESSION,
            'session_id' => session_id(),
            'cookie' => $_COOKIE,
            'server' => $_SERVER,
            'code' => 0
        ];

        session_set_cookie_params(3600, '/', '.sso.example3.com', true, true);
        $allowOriginConfig = [
            'https://www.example1.com',
            'https://www.example2.com',
        ];
        // P3P: Platform for Privacy Preferences, 是W3C公布的一项隐私保护推荐标准，以为用户提供隐私保护。
        // P3P标准的构想是：Web 站点的隐私策略应该告之访问者该站点所收集的信息类型、信息将提供给哪些人、信息将被保留多少时间及其使用信息的方式，如站点应做诸如 “本网站将监测您所访问的页面以提高站点的使用率”或“本网站将尽可能为您提供更合适的广告”等申明。访问支持P3P网站的用户有权查看站点隐私报告，然后决定是否接受cookie 或是否使用该网站。
        // 在Firefox不发送P3P也能跨域成功
        header("P3P: CP='CURa ADMa DEVa PSAo PSDo OUR BUS UNI PUR INT DEM STA PRE COM NAV OTC NOI DSP COR'");
        // 不一定所有浏览器都支持HTTP_ORIGIN,实际使用时要确认一下
        $httpOrigin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : '';
        if ($httpOrigin && in_array($httpOrigin, $allowOriginConfig)) {
            header("Access-Control-Allow-Origin:" . $httpOrigin);
        }
        header("Access-Control-Allow-Credentials:true");
        header("Access-Control-Max-Age:3600");

        ob_clean();
        header('Content-type:application/json;charset=utf-8');
        //指定JSON_PARTIAL_OUTPUT_ON_ERROR,避免$data中有非utf-8字符导致json编码返回false
        echo json_encode($response, JSON_PARTIAL_OUTPUT_ON_ERROR);
        exit;

    }
}