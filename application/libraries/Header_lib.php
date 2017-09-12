<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Header_lib {

    private $title;
    private $base_url;
    private $css;
    private $js;
    private $lib;
    private $arrCss;
    private $arrJs;
    private $arrLib;

    function __construct($param) {
        $CI = & get_instance();
        $this->base_url = $CI->config->item('base_url');
        $this->css = $CI->config->item('css');
        $this->js = $CI->config->item('js');
        $this->lib = $CI->config->item('lib');

        if (!isset($param['title'])) {
            $this->title = 'PJBS';
        } else {
            $this->title = $param['title'] . ' | PJBS';
        }

        if (!isset($param['arrCss'])) {
            $this->arrCss = '';
        } else {
            $this->arrCss = $param['arrCss'];
        }

        if (!isset($param['arrJs'])) {
            $this->arrJs = '';
        } else {
            $this->arrJs = $param['arrJs'];
        }

        if (!isset($param['arrLib'])) {
            $this->arrLib = '';
        } else {
            $this->arrLib = $param['arrLib'];
        }
    }

    function loadHeader() {
        $CI = & get_instance();
        $pageCss = '';
        $pageJs = '';
        $pageLib = '';

        $header['title'] = $this->title;

        foreach ($this->arrCss as $value) {
            if ($value != '') {
                $pageCss = $pageCss . '<link href="' . $this->base_url . $this->css . $value . '" rel="stylesheet">';
            }
        }
        $header['css'] = $pageCss;

        foreach ($this->arrJs as $value) {
            if ($value != '') {
                $pageJs = $pageJs . '<script src="' . $this->base_url . $this->js . $value . '"></script>';
            }
        }
        $header['js'] = $pageJs;

        foreach ($this->arrLib as $value) {
            if ($value != '') {
                $pageLib = $pageLib . '<script src="' . $this->base_url . $this->lib . $value . '"></script>';
            }
        }
        $header['lib'] = $pageLib;
        return $CI->load->view('header_view', $header, TRUE);
    }

}