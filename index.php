<?php
session_start();
include "templates/header.php";
?>

<?php if (isset($_SESSION["flash"])): ?>
      <p>
         <?= htmlspecialchars($_SESSION["flash"])?>
      </p>
   <?php unset($_SESSION["flash"]); ?>   
<?php endif?>

<main>
   <h2>Welcome to the index.php file </h2>   
   <h3>Acciones que hacer:</h3>
   <ul>
      <li><a href="create-form.php">Create new Character</a></li>
    </ul>
</main>
<?php
include "templates/footer.php";
?>