<?php
session_start();
if (isset($_SESSION['sehelheadmin'])){
// die('indexadmin session ok ');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard SehelheTeshel</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
</head>
<?php
include 'MC/instanceClient.php';
if(isset($_POST['gov'])){
    $repcat=$client->listeClientsGov($_POST['gov']);
}
else{
    $repcat=$client->listeClients();
}
?>
<body>

<div id="wrapper">

    <?php include_once 'nav.php';?>
<div class="col-lg-6">
    <h2>Gestion des clients</h2>
    <h3> <a href="AjouterClient.php" >

            <button type="button" class="btn btn-info"><i class="fa fa-plus-circle"></i> Ajouter </button>

        </a></h3>
    <form action="GestionClient.php" method="post">
    <div class="form-group input-group">

        <select class="form-control" name="gov" >
            <option>ARIANA</option>
            <option>BEJA</option>
            <option>BEN AROUS</option>
            <option>BIZERTE</option>
            <option>GABES</option>
            <option>GAFSA</option>
            <option>JENDOUBA</option>
            <option>KAIROUAN</option>
            <option>KASSERINE</option>
            <option>KEBILI</option>
            <option>KEF</option>
            <option>MAHDIA</option>
            <option>MANOUBA</option>
            <option>MEDENINE</option>
            <option>MONASTIR</option>
            <option>NABEUL</option>
            <option>SFAX</option>
            <option>SIDI BOUZID</option>
            <option>SILIANA</option>
            <option>SOUSSE</option>
            <option>TATAOUINE</option>
            <option>TOZEUR</option>
            <option>TUNIS</option>
            <option>ZAGHOUAN</option>
        </select>
                <span class="input-group-btn">
                  <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                </span>
    </div>
    </form>
    <?php if (isset($_GET['Msg'])){ ?>
        <div class="alert alert-dismissable alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <?php echo $_GET['Msg'] ; ?>
        </div>
    <?php } ?>
    <?php if (isset($_GET['err'])){ ?>
        <div class="alert alert-dismissable alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <?php echo $_GET['err'] ; ?>
        </div>
    <?php } ?>

    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped tablesorter">
            <thead>
            <tr>
                <td colspan="2">Opérations <i class="fa fa-sort"></i></td>
                <th>Code client <i class="fa fa-sort"></i></th>
                <th>Nom  <i class="fa fa-sort"></i></th>
                <th>Prenom <i class="fa fa-sort"></i></th>
                <th>mail <i class="fa fa-sort"></i></th>
                <th>Login <i class="fa fa-sort"></i></th>
                <th>mot de passe <i class="fa fa-sort"></i></th>
                <th>Adresse <i class="fa fa-sort"></i></th>
                <th>Date de naissance <i class="fa fa-sort"></i></th>
                <th>Gouvernerat <i class="fa fa-sort"></i></th>
            </tr>
            </thead>
            <tbody>
            <?php  while($clients=$repcat->fetch()){ ?>
            <tr>
                <td><a href="modifClient.php?id=<?php echo $clients['code_client']; ?>" >
                        <button type="button" class="btn btn-success"><i class="fa fa-pencil-square-o"></i> Editer </button>
                    </a></td>
                <!-- la fonction javascript confirm permet de verifier si le user confirme ou pas la supprimer -->
                <td><a href="supprimeclient.php?id=<?php echo $clients['code_client']; ?>" onclick="if(!confirm('voulez vous supprimer'))return false;">
                        <button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i> Supprimer</button>
                    </a></td>
                <td><?php echo $clients['code_client']; ?> </td>
                <td><?php echo $clients['nom_client']; ?></td>
                <td><?php echo $clients['prenom_client']; ?></td>
                <td><?php echo $clients['mail']; ?> </td>
                <td><?php echo $clients['login']; ?></td>
                <td><?php echo $clients['mdp']; ?></td>
                <td><?php echo $clients['adresse']; ?></td>
                <td><?php echo $clients['dateNaissance']; ?></td>
                <td><?php echo $clients['gouv']; ?></td>
            </tr>
            <?php
            }
            //$repcat->closeCursor();
            ?>
            </tbody>
        </table>
    </div>
</div>
</div><!-- /.row -->

<!-- JavaScript -->
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.js"></script>

<!-- Page Specific Plugins -->
<script src="js/tablesorter/jquery.tablesorter.js"></script>
<script src="js/tablesorter/tables.js"></script>

</body>
</html>
<?php
}
else
{
//  die('adconnecti');
    $redirect="../adconnecti.php";
    include 'redirection.php';
}
?>