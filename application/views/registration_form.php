<? include(dirname(__FILE__).'/common/_header.php');?>
<?php
if($this->session->userdata['logged_in']['admin']!="admin")
{
    echo "<h2>Kad registruoti naujus naudotojus reikia būti administratoriumi</h2>";
}
else{


?>
<h2>Registration Form</h2>
<hr/>
<?php
echo "<div class='error_msg'>";
echo validation_errors();
echo "</div>";
echo form_open('user_authentication/new_user_registration');

echo form_label('Prisijungimo vardas: ');
echo"<br/>";
echo form_input('username');
echo "<div class='error_msg'>";
if (isset($message_display)) {
echo $message_display;
}
echo "</div>";
echo"<br/>";
echo form_label('El. paštas : ');
echo"<br/>";
$data = array(
'type' => 'email',
'name' => 'email_value'
);
echo form_input($data);
echo"<br/>";
echo"<br/>";
echo form_label('Slaptažodis : ');
echo"<br/>";
echo form_password('password');
echo"<br/>";
echo"<br/>";
echo form_label("Vardas");
echo "<br/>";
echo form_input("name");
echo"<br/>";
echo"<br/>";
echo form_label("Pavardė");
echo "<br/>";
echo form_input("surname");
echo"<br/>";
echo"<br/>";
echo form_label('admin?');
echo"<br/>";
echo form_input('type');
echo"<br/>";
echo"<br/>";
echo form_submit('submit', 'Registruoti');
echo form_close();
?>
<!--<a href="--><?php //echo base_url() ?><!-- ">For Login Click Here</a>-->
<?php }?>
<? include(dirname(__FILE__).'/common/_footer.php');?>