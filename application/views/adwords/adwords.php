<? include(dirname(__FILE__).'/../common/_header.php');?>

<table class="clients-table">
<thead>
<th>Klientas</th>
<th>Įmonės kodas</th>
<th>Tel. Numeris</th>
<th>El. Paštas</th>
<th>Daugiau</th>
</thead>
<tbody>
<?php foreach($adwords as $klientas){
	echo "<tr>";
	echo "<td>".$klientas->name."</td>";
	echo "<td>".$klientas->imones_kodas."</td>";
	echo "<td>".$klientas->number."</td>";
	echo "<td>".$klientas->email."</td>";

    echo "<td>
    <a class='btn btn-primary' href='".base_url()."index.php/adwords/show/".$klientas->adwords_company_code."'><i class='fa fa-commenting-o' aria-hidden='true'></i></a></td>";
	echo "</tr>";
	}
	?>
</tbody>
</table> 
<? include(dirname(__FILE__).'/../common/_footer.php');?>