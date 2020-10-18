<?php
// include "../library/process.php";

$mysqli = new mysqli('localhost', 'root', '', 'kopisop') or die(mysqli_error($mysqli));

$query = mysqli_query($mysqli, "SELECT * FROM Food");

while ($data = mysqli_fetch_array($query)) {
?>

    <img class="card-img" src="<?php echo $data('food_pic'); ?>" alt="Image 1">
    <button type="button" class="btn btn-info">Add</button>
<?php

}

?>