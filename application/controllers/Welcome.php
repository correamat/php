<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
	    $this->load->library('mongo_db', array('activate' => 'mdb'), 'mongo_db');

	    /** SELECIONA TODO CONTEÚDO DENTRO DA COLLECTION NOME */

         $res = $this->mongo_db->get('nome');
         echo '<pre>';
                 print_r($res);exit;


        //$this->mongo_db->where('_id', new MongoDB\BSON\ObjectID('5c3bc3d5386c293b225f11c5'));
        //$this->mongo_db->set('name','Matheus Videira Correa');

        /** ATUALIZAR */

        //$this->mongo_db->update('nome');

        /** DELETAR */

        //$result =  $this->mongo_db->delete('nome');
        //var_dump($result);exit;
        /** INSERIR */
        //$this->mongo_db->insert('nome', array('name' => 'Felipe'));

	}
}
