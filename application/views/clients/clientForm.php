<? include(dirname(__FILE__).'/../common/_header.php');?>
    <div id="login">
        <h2>Kliento pridėjimas</h2>
        <hr/>
        <?php
        echo "<div class='error_msg'>";
        echo validation_errors();
        echo "</div>";
        echo form_open('clients/newClient');

        echo form_label('Kliento pavadinimas: ');
        echo"<br/>";
        echo form_input('name');
        echo "<div class='error_msg'>";
        if (isset($message_display)) {
            echo $message_display;
        }
        echo "</div>";
        echo"<br/>";
        echo form_label('Email : ');
        echo"<br/>";
        $data = array(
            'type' => 'email',
            'name' => 'email'
        );
        echo form_input($data);
        echo"<br/>";
        echo"<br/>";
        echo form_label("Telefono numeris");
        echo"<br/>";
        echo form_input("number");
        echo"<br/>";
        echo"<br/>";
        echo form_label('Įmonės kodas');
        echo"<br/>";
        echo form_input('imones_kodas');
        echo"<br/>";
        echo"<br/>";
        echo form_label("PVM kodas");
        echo"<br/>";
        echo form_input("pvm_code");
        echo"<br/>";
        echo"<br/>";
        echo form_label('Sumokėjimo terminas');
        echo "<br/>";
        echo form_input('payment_due');
        echo "<br/>";
        echo "<br/>";
        echo form_label('Kontaktinis asmuo');
        echo "<br/>";
        echo form_input('contact_name');
        echo "<br/>";
        echo "<br/>";
        echo form_label('Adresas');
        echo "<br/>";
        echo form_input('address');
        echo "<br/>";
        echo "<br/>";
        echo form_label('Puslapis');
        echo "<br/>";
        echo form_input('www');
        echo "<br/>";
        echo "<br/>";
        echo form_label('Adwords kampanijos kodas');
        echo "<br/>";
        echo form_input('adwords_company_code');
        echo "<br/>";
        echo "<br/>";
        echo form_submit('submit', "Išsaugoti");
        echo form_close();
        ?>
<!--        <a href="--><?php //echo base_url() ?><!-- ">For Login Click Here</a>-->
    </div>
<? include(dirname(__FILE__).'/../common/_footer.php');?>