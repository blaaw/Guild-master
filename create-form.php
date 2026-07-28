<?php
include "templates/header.php";
?>
<form action="handlers/create.php" method="post" enctype="multipart/form-data">
    <label for="name">
        Name: 
        <input type="text" name="name" id="name" required>
        <br>
    </label>
    <label for="class">
        Class:
        <select name="class" id="class" required>
            <option value="warrior">Warrior</option>
            <option value="magician">Magician</option>
            <option value="support">Support</option>
        </select>
        <br>
    </label>
    <label for="hp">
        Max HP:
        <input type="number" name="hp" id="hp" required>
        <br>
    </label>
    <label for="gold">
        Money:
        <input type="number" name="gold" id="gold">
        <br>
    </label>
    <fieldset>
        <legend>Inventory</legend>
        <input type="checkbox" name="inventory[]" id="sword" value="Sword">
        <label for="sword">Sword</label>

        <input type="checkbox" name="inventory[]" id="potion" value="Potion">
        <label for="potion">Potion</label>
        
        <input type="checkbox" name="inventory[]" id="magic-book" value="Magic Book">
        <label for="magic-book">Magic Book</label>
    </fieldset>
    <label for="avatar">
        Avatar:
        <input type="file" name="avatar" id="avatar" >
    </label>
    <br>
    <button type="submit">Create Character</button>
</form>
<a href="index.php">Go back to main page</a>
<?php
include "templates/footer.php";
?>