<?php
function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function check_numeric($name)
{
    
    if(!is_numeric($name) )
    {
        return true;
    }
    return false;
}
function str_length($name)
{
    
    if(strlen($name) > 0)
    {
        return true;
    }
    return false;
}

function min_length($value,$min)
{
    if(strlen($value) < $min)
    {
        return false;
    }
    return true;
}

function max_length($value,$max)
{
    if(strlen($value) > $max)
    {
        return false;
    }
    return true;
}



function validate_email($email)
{
    if(filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        return true;
    }
    return false;
}


?>