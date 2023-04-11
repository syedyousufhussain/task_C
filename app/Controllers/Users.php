<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\User_model;

class Users extends BaseController {

    public function initController(
        RequestInterface $request,
        ResponseInterface $response,
        LoggerInterface $logger) {
    //     echo"hello world";
    //     // return view('welcome_message');
        // $parent = new Users();
        // parent::__construct();
        parent::initController($request, $response, $logger);

        $this->load->model('users_model');
    }

    public function index() {
        // echo"hello world";
        // $this->load->model('users_model');
        $data['users'] = $this->users_model->get_users();
        $this->load->view('welcome_message', $data);
    }

    public function add() {
        $this->users_model->add_user();
        echo json_encode(array("status" => true));
    }

    public function edit() {
        $this->users_model->edit_user();
        echo json_encode(array("status" => true));
    }

    public function delete() {
        $this->users_model->delete_user();
        echo json_encode(array("status" => true));
    }
}