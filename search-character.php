<?php
include ("templates/header.php");
?>
<h2>Search any Character by Name</h2>
<form action="" method="GET">
    <label for="search-name">
        <input type="text" name="search-name" id="search-name">
        <button type="submit">search</button>
    </label>
</form>

<?php
include ("handlers/read.php");

if ($_GET) {
    $characterCard = getSingleCharacterCard($_GET["search-name"]);
    echo $characterCard;
}
?>
<a href="index.php">Go back to main page</a>
<?php
include ("templates/footer.php");
?>