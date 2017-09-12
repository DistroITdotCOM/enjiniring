<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Rcfa extends CI_Controller {

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
        echo preg_replace('/\s\s+/', '', $this->load->view('rcfa/tab_view', NULL, TRUE));
    }

}
