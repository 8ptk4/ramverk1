<?php

namespace Anax\View;

/**
 * View to display all books.
 */
// Show all incoming variables/functions
//var_dump(get_defined_functions());
//echo showEnvironment(get_defined_vars());

// Gather incoming variables and use default values if not set
$items = isset($items) ? $items : null;

// Create urls for navigation
$urlToCreate = url("book/create");
$urlToDelete = url("book/delete");



?><h1>View all books</h1>

<div style="width: 100%; display: inline-flex; justify-content: space-between;">
    <form action="<?= $urlToCreate ?>">
        <input class="button save" type="submit" value="Add book">
    </form>
    <form action="<?= $urlToDelete ?>">
        <input class="button save" type="submit" value="Delete book">
    </form>
</div>
<?php if (!$items) : ?>
    <p>There are no books to show.</p>
<?php
    return;
endif;
?>

<table style="width: 100%; border: 1px solid grey;">
    <tr>
        <th><p>Id</p></th>
        <th><p>Titel</p></th>
        <th><p>Author</p></th>
        <th><p>Cover</p></th>
    </tr>
    <?php foreach ($items as $item) : ?>
    <tr style="text-align: center;">
        <td>
            <p><a href="<?= url("book/update/{$item->id}"); ?>"><?= $item->id ?></a></p>
        </td>
        <td><p><?= $item->title ?></p></td>
        <td><p><?= $item->author ?></p></td>
        <td><img src="<?= $item->cover ?>" alt="alternatetext" style="width:50px;height:70px;"></td>
    </tr>
    <?php endforeach; ?>
</table>
