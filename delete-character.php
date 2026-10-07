<?php
include "templates/header.php";
?>
<form action="handlers/delete.php" method="POST">
    <label for="char-name">
        Character name:
        <input type="text" name="char-name" id="char-name">
    </label>
   <button type="submit">Delete character</button> 
</form>
<?php
include "templates/footer.php";
?>
