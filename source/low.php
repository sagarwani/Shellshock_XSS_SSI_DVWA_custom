<?php
#HINT: Do not attempt any XSS attack here.

$field_empty = 0;

if(isset($_POST["form"]))
{

    $firstname = ucwords(ip_addr1(strtolower($_POST["firstname"])));
    $lastname = ucwords(ip_addr1(strtolower($_POST["lastname"])));

    if($firstname == "" or $lastname == "")
    {

        $field_empty = 1;

    }

    else
    {

        $line = '<p>Hello ' . $firstname . ' ' . $lastname . ',</p><p>Your IP address is:  ' . '<i><b><!--#echo var="REMOTE_ADDR" --></b></i></p>';

        // Writes a new line to the file
        $fp = fopen("server-ip.shtml", "w");
        fputs($fp, $line, 200);
        fclose($fp);

        header("Location: server-ip.shtml");

        exit;

    }

}

?>
