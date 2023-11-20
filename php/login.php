<?php

// if auth is successful then we store the token so we can check it in other requests
session_start();

/* 
bypassing connecting to the database and checking with select for the purposes of learning Ajax 

Now, every input is inside $_POST['input-name']
*/
if ($_POST['email'] == 'user@user.com' && $_POST['password'] == '1234') {
    // if email and password are correct we are logged in

    //hash token
    $_SESSION['token'] = password_hash(session_id(), PASSWORD_DEFAULT);

    // send back something with json - this time send token only
    echo json_encode(['token' => "${_SESSION['token']}"]);
} else {
    // if authentication fails we need to send back something - error, because javascript looks for this with if (data.error)
    echo json_encode(['error' => "Incorrect email and/or pass"]);

}
