<?php /** @var \TManagment\DTO\TasksDTO $data */?>

<h1> Dashboard </h1>

<h2> My Tasks </h2>


    <table border="1">
    <thead>
    <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Location</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $task):?>
        <tr>
            <td><?=$task->getTitle();?></td>
            <td><?=$task->getDescription();?></td>
            <td><?=$task->getLocation();?></td>
            <td><a href="edit_task.php?id=<?=$task->getId();?>">Edit Task</a> </td>
            <td><a href="delete_task.php?id=<?=$task->getId();?>">Delete Task</a> </td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>

<a href="add_task.php">Add Task</a>




