<html>
<?php
if (isset($this->session->userdata['logged_in'])) {

    header("location: ".base_url()."/index.php/user_authentication/user_login_process");
}
?>
<head>
<meta charset="utf-8"/>
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
    <style>
        img.cet-logo {
            width: 300px;
            margin-bottom: 50px;
        }
        div#login {
            /* float: left; */
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 20%;
            margin-top: 50px;
        }
        input {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid black;
        }

        input[type="submit"] {
            background: #29abe2;
            color: white;
            font-size: 14px;
            font-weight: 800;
            border-radius: 4px;
            text-transform: uppercase;
            border: 1px solid #29abe2;
            transition: 0.5s;
        }
        input[type="submit"]:hover{
            background: white;
            color: #29abe2;
            transition: 0.5s;
        }
    </style>
</head>
<body>
<?php
if (isset($logout_message)) {
    echo "<div class='message'>";
    echo $logout_message;
    echo "</div>";
}
?>
<?php
if (isset($message_display)) {
    echo "<div class='message'>";
    echo $message_display;
    echo "</div>";
}
?>
<div id="main">
    <div id="login">
        <img class="cet-logo" src="http://www.cet.lt/image/logo.svg"/>
        <?php echo form_open('user_authentication/user_login_process'); ?>
        <?php
        echo "<div class='error_msg'>";
        if (isset($error_message)) {
            echo $error_message;
        }
        echo validation_errors();
        echo "</div>";
        ?>
        <input type="text" name="username" id="name" placeholder="Prisijungimo vardas"/><br /><br />
        <input type="password" name="password" id="password" placeholder="Slaptažodis"/><br/><br />
        <input type="submit" value=" Login " name="submit"/><br />
        <!--<a href="--><?php //echo base_url() ?><!--index.php/user_authentication/user_registration_show">To SignUp Click Here</a>-->
        <?php echo form_close(); ?>
    </div>
</div>
</body>
</html>