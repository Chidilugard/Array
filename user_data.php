# Assignment
Array Data Registration


<?php

$user_data = array(
    array(
        
        'user_name' => 'Chidi Uwa',
        'user_email' => 'okay@gmail.com',
        'user_dob' => '07-07-1987',
        'user_gender' => 'Male',
        'user_country' => 'Nigeria'
        
    ),
    
     array(
        
        'user_name' => 'Sola Bola',
        'user_email' => 'solly@gmail.com',
        'user_dob' => '07-08-1988',
        'user_gender' => 'Female',
        'user_country' => 'Gambia'
        
    ),
    
     array(
        
        'user_name' => 'Filo Ayu',
        'user_email' => 'soy@gmail.com',
        'user_dob' => '07-08-1958',
        'user_gender' => 'Male',
        'user_country' => 'Congo'
        
    ),
);

// Filter user Data
function filteruserData(&$str) {
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if (strstr($str, '"'))
        $str = '"' . str_replace('"', '""', $str) . '"';
}

// File Name & Content Header
$file_name = "user_data.cvs";
header("Content-Disposition: attachment; filename=\"$file_name\"");
header("Content-Type: application/vnd.ms-excel");

//To define column name in first row.
$column_names = false;
// run loop through each row in $user_data
foreach ($user_data as $row) {
    if (!$column_names) {
        echo implode("\t", array_keys($row)) . "\n";
        $column_names = true;
    }
    // The array_walk() function runs each array element in a user-defined function.
    array_walk($row, 'filteruserData');
    echo implode("\t", array_values($row)) . "\n";
}
exit;
?>
