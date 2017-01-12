<?php 

// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection     =   mysqli_connect($database_host, $database_user, $database_pass);

// Selecting Database
$db             =   mysqli_select_db($connection, $database_db);


// Storing Session
$user_check     =   $_SESSION['login_user'];

// SQL Query To Fetch Complete Information Of User
$ses_sql        =   mysqli_query($connection, "select email from users where username='$user_check'");
$row            =   mysqli_fetch_assoc($ses_sql);
$user_email     =   $row['email'];

function get_gravatar( $email, $s = 200, $d = 'mm', $r = 'g', $img = false, $atts = array() ) {
    $url = 'https://www.gravatar.com/avatar/';
    $url .= md5( strtolower( trim( $email ) ) );
    $url .= "?s=$s&d=$d&r=$r";
    if ( $img ) {
        $url = '<img src="' . $url . '"';
        foreach ( $atts as $key => $val )
            $url .= ' ' . $key . '="' . $val . '"';
        $url .= ' />';
    }
    return $url;
}

$gravatar = get_gravatar($user_email);

?>