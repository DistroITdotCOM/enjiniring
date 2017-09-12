<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function _remap($method) {
        $param_offset = 2;
        if (!method_exists($this, $method)) {
            $param_offset = 1;
            $method = 'view';
        }
        $params = array_slice($this->uri->rsegment_array(), $param_offset);
        call_user_func_array(array($this, $method), $params);
    }

    public function view() {
        $data['component'] = 'dashboard/view_view';
        $data['rs_component'] = '';
        $data['notification'] = '';
        $param['title'] = 'Enjiniring';
        $param['arrCss'] = array(
            '../lib/jquery-easyui-1.4.4/themes/default/easyui.css',
            '../lib/jquery-easyui-1.4.4/themes/icon.css'
        );
        $param['arrJs'] = array();
        $param['arrLib'] = array(
            'jquery-easyui-1.4.4/jquery.min.js',
            'jquery-easyui-1.4.4/jquery.easyui.min.js'
        );
        $this->load->library('Header_lib', $param);
        $data['header'] = $this->header_lib->loadHeader();
        echo preg_replace('/\s\s+/', '', $this->load->view('template_view', $data, TRUE));
    }

}
