<? include(dirname(__FILE__).'/../common/_header.php');?>
<div class="top-clients-menu">
    <li class="menu-item"><a class="btn btn-success" href="<?php echo base_url();?>index.php/bills/newBillForm/"><i class="fa fa-plus-circle"></i> Nauja sąskaita</a></li>
</div>
<table class="clients-table">
<thead>
<th>ID</th>
<th>Failo Pavadinimas</th>
<th>Kliento Pavadinimas</th>
<th>Peržiūrėti</th>
</thead>
<tbody>
<?php foreach($agreements as $agreement){
//    var_dump($klientas->komentaras);
	echo "<tr>";
	echo "<td>".$agreement->bill_id."</td>";
	echo "<td>".$agreement->file_name."</td>";
	echo "<td>".$agreement->client_name."</td>";
	echo "<td><a class='btn btn-primary' href='".$agreement->path."'><i class='fa fa-commenting-o' aria-hidden='true'></i></a></td>";
	echo "</tr>";
	}
	?>
</tbody>
</table>
<?php include(dirname(__FILE__).'/../common/_footer.php');?>