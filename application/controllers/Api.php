<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Api extends MY_Controller 
{
	//private $connection;
        public function __construct(){            
            parent::__construct();                                        
            header("Access-Control-Allow-Origin: *");
            $this->load->model('MY_Model');
            $this->load->library('session');   
            $this->load->helper('responsemessages_helper');            
            $this->load->helper('my_helper'); 
            error_reporting(0);
            $this->res = new stdClass();
        }

        public function index(){                        
            
            $request = json_decode(rtrim(file_get_contents('php://input'), "\0"));            
            $id = $request->user_id;            
            $header = $this->input->request_headers();
            $accesstoken = $header['Accesstoken'];
            // print_r($accesstoken);die();
            if ($this->check_accesstoken($id, $accesstoken)) {
                //do your code

                $this->res->success = 'true';
                $this->res->message = ResponseMessages::getStatusCodeMessage(200);
                $this->res->data = [];
            } else {
                // $this->res->status = 'Failed';
                $this->_error('error', ResponseMessages::getStatusCodeMessage(101));
            }
            $this->_output();
            exit();			
        }                        
        
        public function check_accesstoken($id, $accesstoken) {            
            $where = array('id' => $id, 'token' => $accesstoken);
            $selectdata = 'id,token';
            //$res = $this->Core_Model->SelectSingleRecord('ai_users', $selectdata, $where, $order = '');
            $res = 1;
            if ($res) {
                return true;
            } else return false;
        }
        
       
        //---------------------*-------------------
        function _output() {         
            $this->res->datetime = date('Y-m-d\TH:i:sP');
            echo json_encode($this->res);
        }
        //---------------------*-------------------
        function _error($error, $reason, $code = null) {          
            $this->res->success = 'false';
            if (isset($this->req->request)) {
                $this->res->request = $this->req->request;
            }
            $this->res->message = $reason;
            $this->res->datetime = date('Y-m-d\TH:i:sP');
            echo json_encode($this->res);
            die();
        }
        
        
}
?>