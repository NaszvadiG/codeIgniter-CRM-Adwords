<? include(dirname(__FILE__).'/../common/_header.php');?>
    <div id="login">
        <h2>Komentaras</h2>
        <hr/>
        <?php
        $kliento_info = $kliento_info[0];
//        var_dump($kliento_info);
        ?>
        <div class="client_info_form">
         <span>Įmonė: <? echo $kliento_info->name;?></span>
         <span>Įmonės kodas: <? echo $kliento_info->imones_kodas;?></span>
         <span>PVM kodas: <? echo $kliento_info->pvm_code;?></span>
         <span>
             Adwords Kampanijos Kodas:
            <? if($kliento_info->adwords_company_code){
                echo $kliento_info->adwords_company_code;
            }
            else{
                echo "Nėra";
            }
            ?>
         </span>
         <span class="email">Kliento El. Paštas: <a href="mailto:<? echo $kliento_info->email;?>"><? echo $kliento_info->email; ?></a></span>
         <span class="number">Kliento Telefono numeris: <a href="tel:<? echo $kliento_info->number;?>"><? echo $kliento_info->number; ?></a></span>
         <span class="pagespeed-information">Pagespeed informacija(atsidaro naujame lange): <?php echo "<a class='btn btn-success' href='".base_url()."index.php/pagespeed/clientShow/".$kliento_info->id."' target='_blank'><i class='fa fa-street-view' aria-hidden='true'></i></a>";?></span>
        </div>
        <?
        echo "<div class='error_msg'>";
        echo validation_errors();
        echo "</div>";
        echo form_open('comments/newComment');
        echo form_hidden('client_id', $kliento_info->id);
        echo "<div class='error_msg'>";
        if (isset($message_display)) {
            echo $message_display;
        }
        echo "</div>";
        echo form_label('Komentaras');
        echo "<br/>";
        echo form_textarea('description');
        echo "<br/>";
        echo "<br/>";
        echo form_submit('submit', 'Išsaugoti');
        echo form_close();
        ?>
<!--        <a href="--><?php //echo base_url() ?><!-- ">For Login Click Here</a>-->
    </div>
<? include(dirname(__FILE__).'/../common/_footer.php');?>