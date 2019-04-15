<?php
require "./requires/function.php";

$page = 'accueil';
include "./includes/head.php";


$priorities = getAllPriorities();
$todos = getAllTodo();



?>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col"></th>
                        <th scope="col">Task</th>
                        <th scope="col">Done</th>
                        <th scope="col">Created at</th>
                        <th scope="col">Updated at</th>
                        <th scope="col">Priority</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($todos as $todo) {
                        $task_date_created = $todo["created_at"];
                        $task_date_updated = $todo["updated_at"];
                        $dateCreated = new DateTime($task_date_created);
                        $dateUpdated = new DateTime($task_date_updated);
                    ?>
                        <tr id="todo-row-id-<?= $todo["id"]; ?>">
                            <th scope="row"><?= $todo["id"]; ?></th>
                            <td style="max-width: 120px;"><img <?=
                                !empty($todo["imgPath"]) ?
                                    'src="'.$todo["imgPath"].'"' :
                                    'src="./images/default.jpg"' ; ?>
                                class="img-thumbnail" /></td>
                            <td><?= $todo["task"]; ?></td>
                            <td>
                                <label class="switch" >
                                    <input <?= ($todo["done"] == 1)? "checked":""; ?> type="checkbox"
                                           class="toggleBtn"
                                           data-value="<?= $todo['id'];?>" />
                                    <span class="slider"></span>
                                </label>
                            </td>
                            <td><?= $dateCreated->format('H:i d/m/Y'); ?></td>
                            <td class="todo-updated-at"><?= $dateUpdated->format('H:i d/m/Y'); ?></td>
                            <td>
                                <?php foreach ($priorities as $priority){ ?>
                                    <?= $priority['id_priority'] == $todo['priority'] ? $priority['name'] : "" ;?>
                                <?php } ?>
                            </td>
                            <td class="row">

                                <a href="/edit.php?id=<?= $todo["id"]; ?>">
                                    <button class="btn btn-sm btn-info" type="button">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </a>

                                <form class="ml-2" action="/delete.php" method="post">
                                    <input type="hidden" name="id" value="<?= $todo["id"]; ?>" />
                                    <button class="btn btn-sm btn-danger" type="submit">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="col-12">
                <a href="/add.php">
                    <button class="btn btn-sm btn-success float-right">
                        <i class="fas fa-plus"></i>
                    </button>
                </a>
            </div>
        </div>
    </div>


<?php


$scripts = ["jquery.min.js", "popperjs.min.js", "bootstrap.min.js", "toggle.js", "toaster.min.js"];
include "./includes/footer.php";

?>