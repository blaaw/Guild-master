<?php
include "templates/header.php";
?>
<main>
<form action="" method="post">
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
        HP:
        <input type="number" name="hp" id="hp">
        <br>
    </label>
    <label for="gold">
        Money:
        <input type="number" name="gold" id="gold">
        <br>
    </label>
    <fieldset>
        <legend>Inventory</legend>
        <input type="checkbox" name="sword" id="sword">
        <label for="sword">Sword</label>

        <input type="checkbox" name="potion" id="potion">
        <label for="potion">Potion</label>
        
        <input type="checkbox" name="magic-book" id="magic-book">
        <label for="magic-book">Magic Book</label>
    </fieldset>
    <label for="avatar">
        Avatar:
        <input type="file" name="avatar" id="avatar" required>
    </label>
    <br>
    <input type="submit" value="Create">
</form>
</main>
<?php
include "templates/footer.php";
?>