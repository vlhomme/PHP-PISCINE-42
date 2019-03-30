<?php
require_once('db.php');
//$res = mysqli_query($mysqli, "SELECT COUNT(1) FROM categories");
?>

<html>
    <head>
        <title>chaussure</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            .logo{
                display: block;
                width: 200px;
                margin-left: auto;
                margin-right: auto;
            }

            .milieu{
                display: block;
                width: 920px;
                height: 200vh;
                margin-top: 0px;
                margin-left: auto;
                margin-right: auto;
                background-color: #AFAFAF;
                padding-top: 1vh;

            }
            body{
                padding: 0px;
                background-color: #616161;
                font-family: Tahoma, Geneva, Kalimati, sans-serif;
            }
            .menu{
                position: absolute;
                width: 920px;
                /*display: block;*/
                /*background-color: #778899;*/
                text-align: center;
                display: flex;
                align-items: center;
            }

            .menuelement{
                position: relative;
                display: block;
                margin: auto;
                width: 250px;
                height: 120px;
                display: inline-block;
                background-color: #D3D3D3;
            }
            
            h2{
                clear: both;
                margin-top: 40px;
                color: white;
            }
            p{
                color: #616161;
            }
            
            .input{
                position: absolute;
                width: 920px;
                margin-top: 170px;
                text-align: center;
                display: flex;
                align-items: center;
            }

            .listitem{
                position: absolute;
                width: 920px;
                margin-top: 170px;
                text-align: center;
                display: flex;
                align-items: center;
                flex-direction: column;
            }

            .images{
                position: relative;
                width: 35vw;
                margin: auto;
                margin-top: 50px;
                border: solid;
                background-color: #767676;
            }

            .images:hover{
                background-color: #4A4A4A;
                border: solid white;
            }

            .connection{
                position: relative;
                display: block;
                margin: auto;
                width: 600px;
                height: 600px;
                display: inline-block;
                background-color: #D3D3D3;
            }
            </style>
 </head>
    <body>
            <div class="milieu">
                    <img src="ressources/chaussures-running.png" alt="logo" class="logo"/>
                    <br>
                    <div class=menu>
                        <div class=menuelement>
                            <form id="catego" action="index.php"><input type="hidden" name="a_recup" value="categories"/></form>
                            <a href="#" onclick='document.getElementById("catego").submit()'><h2>Categories</h2></a>
                        </div>
                        <div class=menuelement>
                            <form id="connection" action="index.php"><input type="hidden" name="a_recup" value="connect"/></form>
                            <a href="#" onclick='document.getElementById("connection").submit()'><h2>Connect</h2></a>
                            <p>ID</p>
                        </div>
                        <div class=menuelement>
                            <form id="panier" action="index.php"><input type="hidden" name="a_recup" value="basket"/></form>
                            <a href="#" onclick='document.getElementById("panier").submit()'><h2>Basket</h2></a>
                            <p>list</p>
                        </div>
                    </div>
                    <?php
                    if ($_GET['a_recup'] == "connect")
                    {
                        ?>
                    <div class='input'>
                    <div class='Connection'>
                    <p>
                    <h2>CONNECT TO WEBSITE</h2>
                    <form method="post" action="connect.php">
                        Mail<br/>
                        <input type="text" name="mail" value="" /><br/>
                        Password<br/>
                        <input type="text" name="passwd" value ="" /><br/>
                        <input type="submit" name="submit" value="connect">
                    </form>
                    <h2>CREATE ACCOUNT</h2>
                    <form method="post" action="create.php">
                        FIRST NAME<br/>
                        <input type="text" name="firstname" value="" /><br/>
                        LAST NAME<br/>
                        <input type="text" name="lastname" value="" /><br/>
                        MAIL<br/>
                        <input type="text" name="mail" value="" /><br/>
                        PASSWORD<br/>
                        <input type="text" name="passwd" value ="" /><br/>
                        <input type="submit" name="submit" value="connect">
                    </form> 
                    <form id='connection' action='index.php' method='get'>
                    <button type='submit' name='a_recup' value='quit'>quit</button>
                    </p>
                    </div>
                    </div>
                    <?php
                }
                ?>
                    <?php
                    if ($_GET['a_recup'] == "basket")
                    {
                        ?>
                    <div class='input'>
                    <div class='Connection'>
                    <p>
                    <form id='connection' action='index.php' method='get'>
                    <button type='submit' name='a_recup' value='quit'>quit</button>
                    </p>
                    </div>
                    </div>
                    <?php
                    }
                    ?>
                    <?php
                    if ($_GET['a_recup'] == "categories")
                    {
                        ?>
                    <div class='input'>
                    <div class='Connection'>
                    <p>
                    <form id='connection' action='index.php' method='get'>
                    <button type='submit' name='a_recup' value='quit'>quit</button>
                    </p>
                    </div>
                    </div>
                    <?php
                    }
                    ?>
                    <?PHP
                    if ($_GET['a_recup'] == "quit" || !(isset($_GET['a_recup'])))
                    {
                        ?>
                    <div class="listitem">
                    <img src="ressources/man.png" alt="manshoe" class="images"/>
                    <img src="ressources/lady.png" alt="ladyshoe" class="images"/>
                    <img src="ressources/kid.png" alt="kidshoe" class="images"/>
                    </div>
                    <?php
                    }
                    ?>
            </div>
    </body>
</html>