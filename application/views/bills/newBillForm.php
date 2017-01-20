<? include(dirname(__FILE__).'/../common/_header.php');?>
    <div id="login">
        <h2>Sutarties Generavimas</h2>
        <hr/>
        <?php
        echo "<div class='error_msg'>";
        echo validation_errors();
        echo "</div>";
        echo form_open('bills/generateBill');
        echo form_hidden('user_id', $user_id);
        echo form_label('Priskirti: ');
        echo"<br/>";
        echo form_dropdown('client_id', $clients);
        echo"<br/>";
        echo form_label("Suma:");
        echo "<br/>";
        echo form_input('suma_be_pvm');
        echo "<br/>";
        echo form_label("Dienos per kurias turi būti apmokama sąskaita");
        echo "<br/>";
        echo form_input('pay_until');
        echo"<br/>";
        echo"<br/>";
        echo form_submit("submit", "Sukurti");
        echo form_close();
        ?>
        <!--        <a href="--><?php //echo base_url() ?><!-- ">For Login Click Here</a>-->
    </div>
<? include(dirname(__FILE__).'/../common/_footer.php');?>