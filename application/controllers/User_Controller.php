<?php
class User_Controller extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->helper(array('form','url' ));
        $this->load->library('session');
    }
    public function index(){
        $this->load->view('pages/user_login' );
    }
    public function check_user(){
        $username_from_input = $this->input->post('username');
        $pwd_from_input = $this->input->post('password');
        $checkUser = $this->user_model->checkUser($username_from_input, $pwd_from_input);
        if($checkUser){
            $data['u'] = $username_from_input;
            $data['p'] = $pwd_from_input;
            $data['isAdmin'] = ($username_from_input == 'admin') ? 'yes' : 'no';
            $this->load->view('pages/user_loggedin', $data);
        }else{
           echo "wrong user name or password, try again"  ;
        }
    }
    public function add_user(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $username_from_input = $this->input->post('username');
            $pwd_from_input = $this->input->post('password');
            $email_from_input = $this->input->post('email');

            if($this->user_model->hasUser($username_from_input)){
                echo "User already exits.";
            }else{
                $addUser = $this->user_model->addUser($username_from_input,$pwd_from_input,$email_from_input);
                if($addUser){
                    echo "Add user successful.";
                }else{
                    echo "Add user failed.";
                }
            }
        }else{
            $this->load->view('pages/add_user');
        }
    }


}
