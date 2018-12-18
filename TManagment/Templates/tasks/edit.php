<?php /** @var \TManagment\DTO\EditTaskDTO $data */?>
<h1>Edit <?=$data->getTask()->getTitle() ?></h1>

<form method="post">
Title: <input type="text" name="title" value="<?= $data->getTask()->getTitle()?>"><br>
Description: <input type="text" name="description" value="<?=$data->getTask()->getDescription()?>"><br>
Location: <input type="text" name="location" value="<?=$data->getTask()->getLocation()?>"><br>
Category:
<select name="category_id">
    <?php foreach ($data->getCategory()as $category){?>
        <option value="<?php echo $category->getId()?>" ><?php echo $category->getName()?></option>
    <?php } ?>
</select><br>
Started On: <input type="date" name="started_on"><br>
End Date: <input type="date" name="due_date"><br>
<input type="submit" name="edit" value="EDIT">
</form>

<a href="dashboard.php">List</a>




