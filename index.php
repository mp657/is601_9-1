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
        $message ="Hello $name,\n\n" .
	          "Thank you for entering this data:\n\n" .
		  "Name: $name\n" .
		  "Email: $email\n" .
		  "Phone: $phone\n";

        break;
}
include 'string_tester.php';
?>
