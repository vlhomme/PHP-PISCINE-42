<?PHP

session_start();

if (isset($_GET))
{
	if (isset($_GET['login']) && isset($_GET['passwd']))
	{
		$_SESSION['login'] = $_GET['login'];
		$_SESSION['passwd'] = $_GET['passwd'];
	}
}
?>


<html><body>
	<form action="index.php" method="get">
		Identifiant: <input type="text" name="login" value="<?PHP if(isset($_SESSION['login'])){echo $_SESSION['login'];} ?>"></br>
		Mot de passe: <input type="text" name="passwd" value="<?PHP if(isset($_SESSION['passwd'])){echo $_SESSION['passwd'];} ?>"></br>
		<input type="submit" value="OK">
	</form>
</body></html>
