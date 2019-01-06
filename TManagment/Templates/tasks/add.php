<?php /** @var \TManagment\DTO\CategoryDTO[] $data */  ?>
<?php
echo "<style>";
include "TManagment/Templates/css/style.css";
echo "</style>";
?>

<div class="add">

<h1> Add Task</h1>
<form method="post" class="form-add" >
    <input class="add-input" type="text" name="title" placeholder="Title"><br>
    <input class="add-input" type="text" name="description" placeholder="Description"><br>
    <input class="add-input" type="text" name="location"  placeholder="Location"><br>
    <select class="add-input" name="category_id" >
        <?php foreach ($data as $category):?>
            <option value="<?=$category->getId();?>"><?=$category->getName() ?></option>
        <?php endforeach;?>
    </select><br>
    <input class="add-input" type="date" name="started_on" placeholder="Start Date" ><br>
    <input class="add-input" type="date" name="due_date" placeholder="End Date"><br>
    <input class="btn" type="submit" name="save" value="Add Task" >
</form>

</div>

<p align="center"><a href="dashboard.php">Dashboard</a></p>