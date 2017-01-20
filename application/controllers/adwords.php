<?php 
error_reporting(E_STRICT | E_ALL);
ini_set('display_errors', '1');

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adwords extends CI_Controller{
    public function __construct() {
        parent::__construct();
// Load session library
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
// Load database
        $this->load->model('client_database');
        $this->load->model('adwords_database');

    }

 function index()
 {
   $data = $this->adwords_database->getAdwordsClients();
     if($data)
     {
         $agreements = array('adwords'=>$data);
         $this->load->view('adwords/adwords', $agreements);
     }
     else{
         $this->load->view('adwords/no_adwords');
     }
 }
    function show($id){
        $data = $this->adwords_database->getAdwords($id);
            $agreements = array('adwords'=>$data);
            $this->load->view('adwords/singleAdwords', $agreements);
    }
    function showByLaikotarpis($id, $laikotarpis){
        $data = $this->adwords_database->getAdwords($id, $laikotarpis);
//        var_dump($data);
echo '
<table class="clients-table">
        <thead>
        <th>Adwords kodas</th>
        <th>Paspaudimų skaičius</th>
        <th>Parodymai</th>
        <th>Vid. Pozicija</th>
        <th>Konversijos</th>
        <th>Konversijų procentas</th>
        <th>Išnaudota suma reklamai</th>
        </thead>
        <tbody>
        ';
foreach($data as $klientas){
    echo "<tr>";
    echo "<td>".$klientas->client_adwords_id."</td>";
    echo "<td>".$klientas->clicks."</td>";
    echo "<td>".$klientas->shows."</td>";
    echo "<td>".$klientas->avg_pos."</td>";
    echo "<td>".$klientas->conversions."</td>";
    echo "<td>".$klientas->conversion_proc."%</td>";
    echo "<td>".$klientas->payment."€</td>";
    echo "</tr>";
}
echo "
</tbody>
</table>";
    }

}