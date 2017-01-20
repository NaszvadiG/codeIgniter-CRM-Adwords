<? include(dirname(__FILE__).'/../common/_header.php');?>
<h1>Ar tikrai norite ištrinti klientą?</h1>
    <a class="btn btn-danger" style="font-size: 24;" href="<?php echo base_url().'index.php/clients/deleteClient/'.$clientId; ?>">Taip</a>
    <a class="btn btn-primary" style="font-size: 24;" href="<?php echo base_url()."index.php/clients/";?>">Ne</a>
<? include(dirname(__FILE__).'/../common/_footer.php');?>