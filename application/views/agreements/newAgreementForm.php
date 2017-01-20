<? include(dirname(__FILE__).'/../common/_header.php');?>
    <div id="login">
        <h2>Sutarties Generavimas</h2>
        <hr/>
        <?php
        echo "<div class='error_msg'>";
        echo validation_errors();
        echo "</div>";
        echo form_open('agreements/generateAgreement');
        echo form_label('Priskirti: ');
        echo"<br/>";
        echo form_dropdown('client_id', $clients);
        echo"<br/>";
        echo"<br/>";
        echo form_submit("submit", "Sukurti");
        echo form_close();
        ?>
        <!--        <a href="--><?php //echo base_url() ?><!-- ">For Login Click Here</a>-->
    </div>
<? include(dirname(__FILE__).'/../common/_footer.php');?>