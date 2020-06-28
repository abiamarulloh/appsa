<?php

if(!function_exists('render')) {
    function render($self, $view, $data, $config = []) {
        $defaultConfig = [ 'header' => true, 'sidebar' => true , 'topbar' => true, 'footer' => true ];
        $config = array_merge($defaultConfig, $config);

        if($config['header'] == true)  $self->load->view('templates/header', $data);
        if($config['sidebar'] == true)  $self->load->view('templates/sidebar', $data);
        if($config['topbar'] == true)  $self->load->view('templates/topbar', $data);
        $self->load->view($view, $data);
        if($config['footer'] == true)  $self->load->view('templates/footer', $data);
    }
}