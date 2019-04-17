<?php
require "./requires/function.php";

$page = 'categories';
include "./includes/head.php";

$categories = getAllCategories();
?>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">
                            <a href="/add_category.php">
                                <button class="btn btn-sm btn-success float-right">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </a>
                        </th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        if (count($categories) == 0){ ?>
                        <tr><td colspan="100" class="alert alert-info">Aucune Catégorie</td></tr>
                    <?php   }
                        foreach ($categories as $category) { ?>
                            <tr id="category-row-id-<?= $category["id_category"]; ?>">
                                <th scope="row"><?= $category["id_category"]; ?></th>
                                <td><?= $category["name"]; ?></td>
                                <td class="row justify-content-end">

                                    <a href="/edit_category.php?id_category=<?= $category["id_category"]; ?>">
                                        <button class="btn btn-sm btn-info" type="button">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </a>

                                    <form class="ml-2" action="/delete_category.php" method="post">
                                        <input type="hidden" name="id_category" value="<?= $category["id_category"]; ?>" />
                                        <button class="btn btn-sm btn-danger" type="submit">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


<?php


$scripts = ["jquery.min.js", "popperjs.min.js", "bootstrap.min.js", "toggle.js", "toaster.min.js"];
include "./includes/footer.php";

?>