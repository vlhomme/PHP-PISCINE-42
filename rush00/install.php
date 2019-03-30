<?php

//----------------------- [ DATABASE CREATION ] -------------------------------

// On se onnecte au parc de BDD
if (!($mysqli = mysqli_connect("localhost", "root", "roottoor")))
	exit("ERROR WHILE CONNECTING TO DATABASE\n");

// On s'assure de partir sur une base vide
$res = mysqli_query($mysqli, "DROP DATABASE IF EXISTS `rush00`");

// On cree de notre BDD rush00
if (!mysqli_query($mysqli, "CREATE DATABASE rush00"))
	exit("ERROR WHILE CREATING DATABASE\n");

// On selectionne notre nouvelle BDD rush00
mysqli_select_db($mysqli, "rush00");

//----------------------- [ TABLES CREATION ] ---------------------------------

// On cree la table users
$res = mysqli_query($mysqli, <<<SQL
	CREATE TABLE `rush00`.`users` (
		`id` INT NOT NULL AUTO_INCREMENT,
		`first_name` CHAR(255) NOT NULL,
		`last_name` CHAR(255) NOT NULL, `mail` CHAR(255) NOT NULL,
		`password` CHAR(255) NOT NULL,
		`admin` BOOLEAN NOT NULL DEFAULT FALSE,
		PRIMARY KEY (`id`)
	)
	ENGINE = InnoDB;
SQL
);

// On cree la table products
$res = mysqli_query($mysqli, <<<SQL
	CREATE TABLE `rush00`.`products` (
		`id` INT NOT NULL AUTO_INCREMENT,
		`category_id` INT NOT NULL,
		`name` CHAR(255) NOT NULL,
		`price` INT NOT NULL,
		`colors` ENUM('white','black','red','blue') NOT NULL,
		`stock` INT NOT NULL,
		PRIMARY KEY (`id`)
	)
	ENGINE = InnoDB;
SQL
);

// On cree la table categories
$res = mysqli_query($mysqli, <<<SQL
	CREATE TABLE `rush00`.`categories` (
		`id` INT NOT NULL AUTO_INCREMENT,
		`name` CHAR(255) NOT NULL,
		PRIMARY KEY (`id`)
	)
	ENGINE = InnoDB;
SQL
);

//---------------------------- [ SEEDING ] ------------------------------------

// On ajoute les categories de base
$res = mysqli_query($mysqli, <<<SQL
	INSERT INTO `categories` (`name`)
	VALUES ('Men'), ('Women'), ('Kid')	
SQL
);
if (!$res)
	exit("ERROR WHILE SEEDING DATABASES CATEGORIES\n");


// On ajoute les produits de base
$res = mysqli_query($mysqli, <<<SQL
	INSERT INTO `products` (`category_id`, `name`, `price`, `colors`, `stock`)
	VALUES
		('1', 'Adidas Sport', '85', 'black', '15'),
		('2', 'Ballerines', '99', 'white', '15'),
		('3', 'Adidas lumineuses', '35', 'blue', '15');
SQL
);
if (!$res)
	exit("ERROR WHILE SEEDING DATABASE PRODUCTS\n");

// On ajoute les users de base
$res = mysqli_query($mysqli, <<<SQL
	INSERT INTO `users` (`last_name`, `first_name`, `mail`, `password`, `admin`)
	VALUES 
		('Guiot--Valentin', 'Alexandre', 'aguiot--@student.42.fr', 'unbonmdp', '1'),
		('Lhomme', 'Virgile', 'vlhomme@student.42.fr', 'unsupermdp', '1'),
		('Niel', 'Xavier', 'xavier@free.fr', 'orangecnul', '0');
SQL
);
if (!$res)
	exit("ERROR WHILE SEEDING DATABASE USERS\n");

//---------------------------- [ PRINT ] --------------------------------------
echo "Database is now ready !", "\n";

$debug = FALSE;
if (!$debug) exit;
// On affiche tous les admins, indexes par id
$res = mysqli_query($mysqli, "SELECT * FROM users WHERE admin = '1'");
//$users = mysqli_fetch_all($res, MYSQLI_ASSOC); 
while ($row = mysqli_fetch_assoc($res))
	$users[$row['id']] = $row;
echo "<pre>"; print_r($users); echo "</pre>";

?>
