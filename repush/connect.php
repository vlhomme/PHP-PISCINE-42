<?php
require_once('db.php');
require_once('session.php');
session_start();

if (!empty($_POST['mail']) && !empty($_POST['passwd']))
{
	$res = mysqli_query($db, "SELECT * FROM users WHERE mail = '{$_POST['mail']}';");
	$user = mysqli_fetch_assoc($res);
	if (hash('whirlpool', $_POST['passwd'] . 'salt') == $user['password'])
	{
    if ($user['suspended'] == '0')
    {
      session_log_user($user['id'], $user['first_name'], $user['last_name'], $user['mail'], $user['admin']);
	  header("Location: index.php");
    }
    else header('Location: error.php?reason=account_suspended');
	}
  else
    header('Location: error.php?reason=bad_credentials');
}
else header('Location: error.php?reason=missing_credentials');

?>
