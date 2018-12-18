<?php /** @var \TManagment\DTO\CategoryDTO[] $data */  ?>

<h1> Add Task</h1>
<form method="post">
    Titele: <input type="text" name="title"><br>
    Description: <input type="text" name="description"><br>
    Location: <input type="text" name="location"><br>
    Category: <select name="category_id">
        <?php foreach ($data as $category):?>
            <option value="<?=$category->getId();?>"><?=$category->getName() ?></option>
        <?php endforeach;?>
    </select><br>
    Start Date: <input type="date" name="started_on"><br>
    End Date: <input type="date" name="due_date"><br>
    <input type="submit" name="save">
</form>