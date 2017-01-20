<? include(dirname(__FILE__).'/../common/_header.php');?>
    <div id="login">
        <h2>Kliento keitimas</h2>
<!--        --><?php //var_dump($clientData);?>
        <hr/>
        <?php
        echo "<div class='error_msg'>";
        echo validation_errors();
        echo "</div>";
        echo form_open('clients/editClient/'.$clientData->id);

        echo form_label('name ');
        echo"<br/>";
        echo form_input('name', $clientData->name);
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
            'name' => 'email',
            'value' => $clientData->email,
        );
        echo form_input($data);
        echo"<br/>";
        echo"<br/>";
        echo form_label("Telefono numeris");
        echo"<br/>";
        echo form_input("number", $clientData->number);
//        set_value('number', $clientData->number);
        echo"<br/>";
        echo"<br/>";
        echo form_label('Įmonės kodas');
        echo"<br/>";
        echo form_input('imones_kodas', $clientData->imones_kodas);
        echo"<br/>";
        echo"<br/>";
        echo form_label("PVM kodas");
        echo"<br/>";
        echo form_input("pvm_code", $clientData->pvm_code);
        echo"<br/>";
        echo"<br/>";
        echo form_label('Sumokėjimo terminas');
        echo "<br/>";
        echo form_input('payment_due', $clientData->payment_due);
        echo "<br/>";
        echo "<br/>";
        echo form_label('Kontaktinis asmuo');
        echo "<br/>";
        echo form_input('contact_name', $clientData->contact_name);
        echo "<br/>";
        echo "<br/>";
        echo form_label('Adresas');
        echo "<br/>";
        echo form_input('address', $clientData->address);
        echo "<br/>";
        echo "<br/>";
        echo form_label('Puslapis');
        echo "<br/>";
        echo form_input('www', $clientData->www);
        echo "<br/>";
        echo "<br/>";
        echo form_label('Adwords kampanijos kodas');
        echo "<br/>";
        echo form_input('adwords_company_code', $clientData->adwords_company_code);
        echo "<br/>";
        echo "<br/>";
        echo form_submit('submit', 'Išsaugoti');
        echo form_close();
        ?>
        <!--        <a href="--><?php //echo base_url() ?><!-- ">For Login Click Here</a>-->
    </div>
<? include(dirname(__FILE__).'/../common/_footer.php');?>