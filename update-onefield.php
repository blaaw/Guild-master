<?php
include("templates/header.php");
?>
<h2>Update one field of a Character</h2>
<form action="handlers/update.php" method="POST">
    <label for="char-name">
        Character name:
        <input type="text" name="char-name" id="char-name">
    </label>

    <label for="field">
        Field to Update:
        <select name="field" id="field">
            <option value="name">Name</option>
            <option value="class">Class</option>
        </select>
    </label>

    <label for="new-value">
        New Value:
        <input type="text" name="new-value" id="new-value">
    </label>
   <button type="submit">Update</button> 
    
</form>

<?php
if ($_POST) {
    $operation = updateCharacter($_POST["char-name"], $_POST["field"], $_POST["new-value"]);   
    echo $operation;
}
?>

<a href="index.php">Go back to main page</a>
<?php
include "templates/footer.php";
?>