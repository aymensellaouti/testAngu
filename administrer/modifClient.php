<?php
session_start();
if (isset($_SESSION['sehelheadmin'])){

include_once 'MC/instanceClient.php';

$repcat=$client->RechercheClientById($_GET['id']);
$thisclient=$repcat->fetch();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Modifier Client</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">


    <!-- Bootstrap Extended -->
    <link href="../common/bootstrap/extend/jasny-fileupload/css/fileupload.css" rel="stylesheet">
    <link href="../common/bootstrap/extend/bootstrap-wysihtml5/css/bootstrap-wysihtml5-0.0.2.css" rel="stylesheet">

</head>

<body>

<div id="wrapper">

<?php include_once 'nav.php';?>

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li><a href="GestionClient.php"><i class="icon-dashboard"></i> Gestion Clients</a></li>
                    <li class="active"><i class="icon-file-alt"></i>Modifier Client</li>
                </ol>
            </div>
        </div><!-- /.row -->
        <div class="row">


            <div class="col-lg-9">
                <form role="form" action="modifierclient.php?cle=<?php echo $thisclient['code_client']; ?>" enctype="multipart/form-data" method="post">

                    <div class="form-group">
                        <label>Nom</label>
                        <input class="form-control" name="nomu" required="required" value="<?php echo $thisclient['nom_client']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Prenom</label>
                        <input class="form-control" name="prenomu" required="required" value="<?php echo $thisclient['prenom_client']; ?>">
                    </div>

                    <div class="form-group">
                        <label>email</label>
                        <input name="emailu" class="form-control" type="email" required="required" value="<?php echo $thisclient['mail']; ?>">
                        <?php if(isset($_GET['message'])){ ?>
                            <div class="alert alert-dismissable alert-danger">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                E-mail déjà inscrit veuillez vérifier votre e-mail
                            </div>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>Login</label>
                        <input class="form-control" name="loginu" required="required" value="<?php echo $thisclient['login']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Date de naissance</label>
                        <input class="form-control" name="dn" type="date" required="required" value="<?php echo $thisclient['dateNaissance']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Adresse</label>
                        <input class="form-control" name="adresseu" required="required" value="<?php echo $thisclient['adresse']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Gouvernorat</label>
                        <select class="form-control" name="gouvu" required="required">
                            <option><?php echo $thisclient['gouv']; ?></option>
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
                    </div>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </form>

            </div>
        </div>
    </div><!-- /#page-wrapper -->



</div><!-- /#wrapper -->

<!-- JavaScript -->
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.js"></script>

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