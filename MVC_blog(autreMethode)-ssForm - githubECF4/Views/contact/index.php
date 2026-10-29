<?php
$title = "Mon portfolio - Contact";
?>
<h1>Contactez-moi</h1>
<?php
//message d'erreur si le formulaire est mal rempli
if (!empty($erreur)) {
?>
    <div class="alert alert-danger" role="alert">
        <?php echo $erreur; ?>
    </div>
<?php
}

//message de confirmation, sinon on affiche le formulaire
if (!empty($success)) {
?>
    <div class="alert alert-success" role="alert">
        <?php echo $success; ?>
    </div>
<?php
} else {
    include '../Views/includes/contactForm.php';
}
