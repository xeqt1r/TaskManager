<?php /** @var \TManagment\DTO\EditTaskDTO $data */?>
<?php
echo "<style>";
include "TManagment/Templates/css/style.css";
echo "</style>";
?>
<h1>Edit <?=$data->getTask()->getTitle() ?></h1>

<div class="edit">

<form method="post" class="form-edit">
<input class="edit-input" placeholder="Title" type="text" name="title" value="<?= $data->getTask()->getTitle()?>"><br>
<input class="edit-input" placeholder="Description" type="text" name="description" value="<?=$data->getTask()->getDescription()?>"><br>
<input class="edit-input" placeholder="Location" type="text" name="location" value="<?=$data->getTask()->getLocation()?>"><br>

<select class="edit-input" name="category_id">
    <?php foreach ($data->getCategory()as $category){?>
        <option value="<?php echo $category->getId()?>" ><?php echo $category->getName()?></option>
    <?php } ?>
</select><br>
<input class="edit-input" placeholder="Started On" type="date" name="started_on"><br>
<input class="edit-input" placeholder="End Date" type="date" name="due_date"><br>
<input  class="btn" type="submit" name="edit" value="EDIT">
</form>

</div>

<p align="center"><a href="dashboard.php">Dashboard</a></p>




