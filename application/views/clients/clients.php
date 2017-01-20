<? include(dirname(__FILE__).'/../common/_header.php');?>
<div class="top-clients-menu">
    <li class="menu-item"><a class="btn btn-success" href="<?php echo base_url();?>index.php/clients/newClient/"><i class="fa fa-plus-circle"></i> Naujas klientas</a></li>
    <li class="menu-item"><a class="btn btn-success" href="<?php echo base_url();?>index.php/clients/allClients/"><i class="fa fa-envelope"></i> Visi Klientai</a></li>
</div>
<div class="col-xs-12">
    <?php echo form_open('clients/clientSearch');?>
    <div class="col-md-1">
    <?php echo form_label("Klientų paieška");
    ?></div><?php
?><div class="col-md-3"><?php
    echo form_input("searchString");
?></div><?php
    ?><div class="col-md-3"><?php
    echo form_submit("submit","Ieškoti");
?></div><?php
    echo form_close();?>
    <br/>
    <br/>
</div>
<table class="clients-table">
<thead>
<th>Klientas</th>
<th>Įmonės kodas</th>
<th>Tel. Numeris</th>
<th>El. Paštas</th>
<th>Paskutinis komentaras</th>
<th>Daugiau</th>
</thead>
<tbody>
<?php // /pagespeed/clientShow/ - pagespeedo linkas ?>
<?php foreach($klientai as $klientas){
//    var_dump($klientas->komentaras);
	echo "<tr>";
	echo "<td>".$klientas->name."</td>";
	echo "<td>".$klientas->imones_kodas."</td>";
	echo "<td>".$klientas->number."</td>";
	echo "<td>".$klientas->email."</td>";
    echo "<td>".$klientas->komentaras."</td>";

    echo "<td><a class='btn btn-warning' href='".base_url()."index.php/clients/editClientForm/".$klientas->id."'><i class='fa fa-pencil' aria-hidden='true'></i></a>
    <a class='btn btn-danger' href='".base_url()."index.php/clients/deleteClientForm/".$klientas->id."'><i class='fa fa-trash' aria-hidden='true'></i></a>
    <a class='btn btn-primary' href='".base_url()."index.php/comments/show/".$klientas->id."'><i class='fa fa-commenting-o' aria-hidden='true'></i></a>
    <a class='btn btn-success' href='".base_url()."index.php/comments/newCommentForm/".$klientas->id."'><i class='fa fa-phone' aria-hidden='true'></i></a>
    <a class='btn btn-warning' href='".base_url()."index.php/pagespeed/clientShow/".$klientas->id."'><i class='fa fa-street-view' aria-hidden='true'></i></a></td>";
	echo "</tr>";
	}
	?>
</tbody>
</table> 
<? include(dirname(__FILE__).'/../common/_footer.php');?>