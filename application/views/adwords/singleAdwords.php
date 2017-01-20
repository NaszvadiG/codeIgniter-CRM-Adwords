<? include(dirname(__FILE__).'/../common/_header.php');?>
    <script>
        $(document).ready(function() {
            $("#laikotarpis").change(function () {
                $('<img src="https://upload.wikimedia.org/wikipedia/commons/b/b1/Loading_icon.gif">').load(function () {
                    $('#adwords-table').html(this);
                });
                jQuery.ajax({
                    url: "<?php echo base_url(); ?>" + "index.php/adwords/showByLaikotarpis/<?php echo $adwords[0]->client_adwords_id; ?>/" + $('#laikotarpis').val() + "/",
                    success: function (data) {
                        $('#adwords-table').html(data);
                    }
                });
            })
        })
    </script>
    <div class="top-clients-menu">

    </div>
<div class="select-time">
    <select id="laikotarpis">
        <option value="MONTH">Mėnuo</option>
        <option value="WEEK">Savaitė</option>
        <option value="YESTERDAY">Vakar</option>
        <option value="TODAY">Šiandien</option>
    </select>
</div>
<br/><br/>
<div id="adwords-table">
    <table class="clients-table">
        <thead>
        <th>Adwords kodas</th>
        <th>Paspaudimų skaičius</th>
        <th>Parodymai</th>
        <th>Vid. Pozicija</th>
        <th>Konversijos</th>
        <th>Konversijų rodiklis</th>
        <th>Išnaudota suma reklamai</th>
        </thead>
        <tbody>
        <?php //var_dump($adwords);?>
        <?php foreach($adwords as $klientas){
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
        ?>
        </tbody>
    </table>
</div>
<br/><br/>
    <a class="btn btn-success" href="<?php echo base_url();?>index.php/adwords">Siųsti ataskaitą</a>
<? include(dirname(__FILE__).'/../common/_footer.php');?>