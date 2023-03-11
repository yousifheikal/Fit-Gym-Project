<?php

// Check value empty or no
function checkEmpty($value)
{
    if(!empty($value))
    {
        return true;
    }
    return false;
}

// validate E-mail
function ValidateEmail($email)
{
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        return false;
    }
    return true;
}

// using function filter data(email)
function filter_email($value)
{
    return filter_input(INPUT_POST, $value, FILTER_SANITIZE_EMAIL);
}

// using function filter data(email)
function filter_text($value)
{
    return filter_input(INPUT_POST, $value, FILTER_SANITIZE_SPECIAL_CHARS);
}
