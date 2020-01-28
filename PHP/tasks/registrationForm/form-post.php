<?php
session_start();
function getValue($fieldName)
{
    return isset($_POST[$fieldName])?$_POST[$fieldName]:"";
}
function setValueToSession($section,$fieldName)
{
    $_SESSION[$section][$fieldName] = isset($_POST[$fieldName])?$_POST[$fieldName]:"";
}
function getValueFromSession($section,$fieldName)
{
    return isset($_SESSION[$section][$fieldName])?$_SESSION[$section][$fieldName]:"";
}
$attributes = array('account'=>array('prefix','fname','lname','dob','phone','email','password','cpassword'), 
                    'address'=>array('addr1','addr2','company','city','state','country','postalCode'),
                    'other'=>array('description','profile','certificate','business','client','contact','hobbies'));

// echo "<pre>";
//  print_r($_POST);
//  print_r($_SESSION);
//   echo "</pre>";

if(isset($_POST['submit'])){
    foreach($attributes as $key=>$value)
    {
        foreach($value as $element=>$item)
        {
            $result = validate($item);
            if($result == "")
            {
            setValueToSession($key,$item);
            }
        }
    }
}
function validate($fieldName)
{
    switch($fieldName)
    {
        case 'fname': if($_POST[$fieldName]=="")
        {
            $fnameError = "Enter first name";
            return $fnameError;
        }
    break;
    case 'lname': if($_POST[$fieldName]=="")
    {
        $lnameError = "Enter last name";
        return $lnameError;
    }
break;

case 'phone': if($_POST[$fieldName] == "")
{
    $phoneError = "Enter phone number";
    return $phoneError;
}
break;
case 'email': if($_POST[$fieldName]=="")
{
    $emailError = "Enter email";
    return $emailError;

}
break;

case 'addr1': if($_POST[$fieldName] == "")
{
    $addr1Error = "Enter address";
    return $addr1Error;
}
break;
case 'addr2': if($_POST[$fieldName] == "")
{
    $addr2Error = "Enter address";
    return $addr2Error;
}
break;
case 'country': if($_POST[$fieldName] == "")
{
    $countryError = "Enter country";
    return $countryError;
}
break;
case 'postalCode': if($_POST[$fieldName] == "")
{
    $postalError = "Enter postal code";
    return $postalError;
}
break;
case 'description': if($_POST[$fieldName] == "")
{
    $descriptionError = "Enter your description";
    return $descriptionError;
}
break;
case 'contact': if($_POST[$fieldName] == "")
{
    $contactError = "Enter contact method";
    return $contactError;
}
break;
default: return "";
}
    
}
                        
?>