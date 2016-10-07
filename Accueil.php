<?php 
	session_start(); 
	require_once('BDD.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="css/style.css">
        <title>Acceuil</title>
    </head>

    <body>
		<?php if( isset($_SESSION['type']) && isset($_SESSION['pseudo']) ): ?>
		<div id="header">
			<center><a href="#"><img src="img/sizeb.png"/></a><center>
			
			<div id="menu">
				<center><ul>
					<a href="#"><li>Profil</li></a>
					<a href="#"><li>Creer Ticket</li></a>
					<a href="#"><li>Visualiser/Modifier ticket</li></a>
					<?php if($_SESSION['type'] == 1) echo "<a href='#'><li>Administration</li></a>"; ?>
				</ul></center>
			</div>
			
		</div>
		
		<?php  
			$query = $bdd->prepare('SELECT * FROM request WHERE state = 0');
			$query->execute();
		?>
		
		<center><h1>Derniers Articles</h1></center>
	<div id="cadre1">
		<div id="solved">
			<center><h2>Résolus</h2></center>
			<ul>
				<?php
					while($res = $query->fetch())
					{
						echo "
						<li>
							<h3>".$res['titre']."</h3>
							<a href='#'><p>".$res['contenu']."</p></a>
						</li>";
					}
				?>
			</ul>
		</div>
            
		<?php  
			$query = $bdd->prepare('SELECT * FROM request WHERE state = 1');
			$query->execute();
		?>
            
		<div id="progress">
			<center><h2>En Avancement</h2></center>
			<ul>
                            <?php
                                while($res = $query->fetch())
				{
                                    echo "
                                    <li>
                                        <h3>".$res['titre']."</h3>
					<a href='#'><p>".$res['contenu']."</p></a>
                                    </li>";
                                }
                            ?>
			</ul>
		</div>
	</div>
                
	<?php  
            $query = $bdd->prepare('SELECT * FROM request WHERE state = 2');
            $query->execute();
	?>
                
	<div id="cadre2">		
		<div id="waiting">
			<center><h2>Non traité</h2></center>
			<ul>
                            <?php
                                while($res = $query->fetch())
				{
                                    echo "
                                    <li>
                                        <h3>".$res['titre']."</h3>
					<a href='#'><p>".$res['contenu']."</p></a>
                                    </li>";
                                }
                            ?>
			</ul>
		</div>
		
		<a href="#"><div id="create">
			<center><h2>DEPOSER UN ARTICLE</h2></center>
		</div></a>
	</div>
		
		<div id="footer">
			<center><p>Groupe SIZEB</p></center>
		</div>
	<?php endif;?>
    </body>
</html>