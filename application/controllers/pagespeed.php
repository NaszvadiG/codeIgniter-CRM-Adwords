<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pagespeed extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model("client_database");
        $this->load->model("pagespeed_database");
    }

    function clientShow($clientID)
    {
      $data = array("clientID"=>$clientID);
      $this->load->view("pagespeed/pagespeed", $data);
    }
    // Visa funkcija veikia su AJAX'U
      function url_get_contents ($Url) {
    if (!function_exists('curl_init')){ 
        die('CURL is not installed!');
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $Url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}
    function clientPageSpeed($clientID)
    {
        // buve rezultatai
        $dataForOld = $this->pagespeed_database->getPageSpeedData($clientID);

        echo "<h2>Senesni duomenys</h2>";
        echo "<table class='pagespeed-info'>";
        echo "<th>Page speed testo rezultatas:</th>";
        echo "<th>Puslapio klaidos</th>";
        echo "<th>Data kada darytas testas";
        foreach($dataForOld as $row){
            echo "<tr><td>".$row->score."</td>";
            echo "<td>".$row->description."</td>";
            echo "<td>".$row->date."</td></tr>";
        }
        echo "</table>";
        // buve END
        // dabartiniai rezultatai
        $client = $this->client_database->getClientById($clientID);
        $clientWebsite = $client[0]->www;
        $url = "https://www.googleapis.com/pagespeedonline/v2/runPagespeed/?url=$clientWebsite&locale=en";
        $json = $this->url_get_contents($url);
        $array = json_decode($json);
        echo "<h2>Naujausi duomenys</h2>";
        echo "<table class='pagespeed-info'>";
        echo "<th>Page speed testo rezultatas:</th>";
        echo "<th>Puslapio klaidos</th>";
        echo "<tr><td>".$array->ruleGroups->SPEED->score."</td>";
        echo "<td>";
        $stringas = "";
        foreach($array->formattedResults->ruleResults as $rules)
        {
            //var_dump($rules);
            if($rules->ruleImpact>0) {
                echo $rules->localizedRuleName . "<br/>";
                $stringas .= $rules->localizedRuleName."<br/>";
            }
        }
        $formData = array(
            'client_pagespeed_id' => $clientID,
            'score' =>  $array->ruleGroups->SPEED->score,
            'description' => $stringas,
            'date' => date("Y-m-d H:m:s"),
         );
        $this->pagespeed_database->insertPageSpeed($formData);
        echo "</td></tr>";
        echo "</table>";
    }

}

?>