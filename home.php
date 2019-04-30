<?php
	include "config.php";
    session_start(); 	
    if (empty($_SESSION['user']) || !isset($_SESSION)) {
header("location: index.php");
}

$ricerca=$_GET["search"];
$ricerco = false;
if(!empty($ricerca)){
	$ricerco = true;
  $stampa_post = "SELECT utente.picture as img, utente.nickname as utente, nazione.name as paese, destinazione.evento AS titolo, viaggio.id AS numero, viaggio.descrizione AS info, data FROM `viaggio` INNER JOIN utente on (viaggio.persona = utente.id) INNER JOIN destinazione ON (viaggio.luogo = destinazione.id) INNER JOIN nazione ON (viaggio.paese = nazione.iso) WHERE (nazione.name LIKE '%{$ricerca}%') OR (destinazione.evento LIKE '%{$ricerca}%') ORDER BY viaggio.data ASC";
    $risultato= $con->query($stampa_post);
}
else{

  $stampa_post = "SELECT utente.picture as img, utente.nickname as utente, nazione.name as paese, destinazione.evento AS titolo, viaggio.id AS numero, viaggio.descrizione AS info, data FROM `viaggio` INNER JOIN utente on (viaggio.persona = utente.id) INNER JOIN destinazione ON (viaggio.luogo = destinazione.id) INNER JOIN nazione ON (viaggio.paese = nazione.iso) ORDER BY viaggio.data ASC";
	$risultato= $con->query($stampa_post);
}

   if($_GET["search"]) {
     // echo "Welcome ". $_GET['search']. "<br />";      
      //exit();
   }
   
if(isset($_POST['pubblica'])){
	//$inserisco_post = "INSERT INTO ";
}

?>
<!Doctype html>
<html>
<head>
<title>Home | ViaggiApp</title>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
		
		<style>
		body {
            background-color: #eeeeee;
        }

        .h7 {
            font-size: 0.8rem;
        }

        .gedf-wrapper {
            margin-top: 0.97rem;
        }

        @media (min-width: 992px) {
            .gedf-main {
                padding-left: 4rem;
                padding-right: 4rem;
            }
            .gedf-card {
                margin-bottom: 2.77rem;
            }
        }

        /**Reset Bootstrap*/
        .dropdown-toggle::after {
            content: none;
        }
		</style>
</head>
<body>    
<nav class="navbar navbar-light bg-white">
        <a href="#" class="navbar-brand">ViaggiApp</a>
		<!-- CERCA -->
        <form class="form-inline" method="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cerchi dei viaggi?">
                <!--
                <div class="input-group-append">
                    <button name="cerca" class="btn btn-outline-primary" type="button" id="button-addon2">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
                -->
            </div>
        </form>
    </nav>


    <div class="container-fluid gedf-wrapper">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="h5">
                        <?php 
                        session_start(); 	
                        if (!empty($_SESSION['user']) && isset($_SESSION)) {
   echo 'Ciao, '.$_SESSION['user']; 
                          $nick = $_SESSION['user'];
                          
                          $sql = "SELECT * FROM utente where nickname = '$nick'";
                          $result=$con->query($sql);
                          if($result == 1){
                           while($row = $result->fetch_assoc()){
                           		$nome = $row['nome'];
                                $cognome = $row['cognome'];
                           } 
                          }
} 
else{
header("location: /index.php");
}
?>
</div>
                        <div class="h7 text-muted">Nome completo : <?php echo $nome . " " . $cognome; ?></div>
                        <div class="h7">Info
                        </div>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Slogan</li>
                    </ul>
          
                </div>
                <br><br>
                                <div class="card gedf-card">
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted">I miei viaggi recenti</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-9 gedf-main">

                <!--- \\\\\\\Post-->
                <div class="card gedf-card">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="posts-tab" data-toggle="tab" href="#posts" role="tab" aria-controls="posts" aria-selected="true">Scrivi un post alla community</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="images-tab" data-toggle="tab" role="tab" aria-controls="images" aria-selected="false" href="#images">Multimediale</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">
                                <div class="form-group">
                                    <label class="sr-only" for="message">post</label>
                                    <textarea class="form-control" id="message" rows="3" placeholder="Cosa hai visitato in questo periodo?"></textarea>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="images-tab">
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Allega file multimediali</label>
                                    </div>
                                </div>
                                <div class="py-4"></div>
                            </div>
                        </div>
                        <div class="btn-toolbar justify-content-between">
                            <div class="btn-group">
                            <select name="course">
                              <option value="0">Seleziona nazione</option>
                            <?php 
                            	$cerca_nazioni = "SELECT iso, name FROM nazione";
                                $riss= $con->query($cerca_nazioni);
	
	if($riss->num_rows > 0){
		
		while($rows=$riss->fetch_array()){ 
        
                            echo "<option value='{$rows['iso']}'>{$rows['name']}</option>";
                            }
        }
                            ?>
                            </select>
                            
                            </div>
                            <div class="btn-group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="fa fa-globe"></i> Pubblica post
                                </button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                    <a class="dropdown-item" href="#"><i class="fa fa-globe"></i> Confermo</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Post /////-->





				    <?php 
	
		//$stampa_post = "SELECT utente.nickname as utente, nazione.name as paese, destinazione.evento AS titolo, viaggio.id AS numero, viaggio.descrizione AS info, data FROM `viaggio` INNER JOIN utente on (viaggio.persona = utente.id) INNER JOIN destinazione ON (viaggio.luogo = destinazione.id) INNER JOIN nazione ON (viaggio.paese = nazione.iso) ORDER BY viaggio.data ASC";
	//$risultato= $con->query($stampa_post);
	
	if($risultato->num_rows > 0){
		
		while($riga=$risultato->fetch_array()){ 
        
                echo '<div class="card gedf-card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="mr-2">
                                    <img class="rounded-circle" width="45" src="img/pic/'.$riga['img'].'" alt="">
                                </div>
                                <div class="ml-2">
                                    <div class="h5 m-0">'.$riga['utente'].'</div>
                       			 <div class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i> '.$riga['data'].'</div>
                                </div>
                            </div>
                            <div>
                                <div class="dropdown">
                                    <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-h"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
                                        <div class="h6 dropdown-header">Configurazione</div>
                                        	<a class="dropdown-item" href="#">Aiuto</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                            <h5 class="card-title">'.$riga['titolo'].' <span style="font-size:12px; color:black; text-decoration:none;">, '.$riga['paese'].'</span></h5>
                        

                        <p class="card-text">
                            '.$riga['info'].'
                        </p>';
                        
                        $stampa_foto = "SELECT url FROM `multimediale` INNER JOIN viaggio on (multimediale.viaggio = viaggio.id) WHERE viaggio.id = {$riga['numero']}";
			
            $ris = $con->query($stampa_foto);
			if($ris->num_rows > 0){
				while($row=$ris->fetch_array()){
					echo "<img src='img/uploads/{$row['url']}' style='width:100%;'>";
				}
			}else{
				echo "<img src='img/null.jpg' style='width:100%;'>";
			}
            echo '
                    </div>
                    <div class="card-footer">
                        <a href="#" class="card-link"><i class="fa fa-gittip"></i> Mi piace</a>
                        <a href="#" class="card-link"><i class="fa fa-comment"></i> Commenta</a>
                        <a href="#" class="card-link"><i class="fa fa-mail-forward"></i> Condividi</a>
                    </div>
                </div>';
                
		
		}
	}else{
      if($ricerco){ echo "<p>La ricerca non ha prodotto risultati</p>";}
      echo "<p>Post non trovati</p>"; 
    }
	
	?>

                



            </div>
            
        </div>
    </div>
</body>
</html>