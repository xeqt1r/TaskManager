<?php /** @var \TManagment\DTO\EditTaskDTO $data */?>
<?php
echo "<style>";
include "TManagment/Templates/css/style.css";
echo "</style>";
?>


<h1>Delete <?=$data->getTask()->getTitle() ?></h1>

<div class="delete">

<form method="post" class="form-delete">
    Title: <input class="delete-input" type="text" name="title" disabled value="<?= $data->getTask()->getTitle()?>"><br>
    Description: <input class="delete-input" type="text" name="description" disabled value="<?=$data->getTask()->getDescription()?>"><br>
    Location: <input class="delete-input" type="text" name="location" disabled value="<?=$data->getTask()->getLocation()?>"><br>
    <input class="btn" type="submit" name="delete" value="Delete">
</form>

</div>

<p align="center"> <a href="dashboard.php">Dashboard</a></p>
