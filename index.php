<?php
//set default values
$name = '';
$email = '';
$phone = '';
$message = 'Enter some data and click on the Submit button.';

//process
$action = filter_input(INPUT_POST, 'action');

switch ($action) {
    case 'process_data':
        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email');
        $phone = filter_input(INPUT_POST, 'phone');

        if (empty($name)) {
	    $message = 'Please enter your name.';
	    break;
	}
	$name = strtolower($name);
	$name = ucwords($name);


	$i = strpos($name, ' ');
	if ($i === false) {
	   $first_name = $name;
	   } else {
	   $first_name = substr($name, 0, $i);
	}

        if (empty($email)) {
	   $message = 'You must enter an email address.';
	   break;
	   } else if(strpos($email, '@') === false) {
	   $message = '@ sign mossing..!';
	   break;
	   } else if(strpos($email, '.') === false) {
	   $message = 'Dot character missing.';
	   break;
	}
	if (strlen($phone) < 7) {
           $message = 'The phone number must contain at least seven digits.';
           break;
        }

        $message ="Hello $first_name,\n\n" .
	          "Thank you for entering this data:\n\n" .
		  "Name: $name\n" .
		  "Email: $email\n" .
		  "Phone: $phone\n";

        break;
}
include 'string_tester.php';
?>
