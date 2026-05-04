<h2>Items</h2>

<a href="/items/create">Add Item</a>

<table border="1">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Description</th>
    <th>Actions</th>
</tr>

<?php foreach ($items as $item): ?>
<tr>
    <td><?= $item['id'] ?></td>
    <td><?= $item['name'] ?></td>
    <td><?= $item['description'] ?></td>
    <td>
        <a href="/items/edit/<?= $item['id'] ?>">Edit</a>
        <a href="/items/delete/<?= $item['id'] ?>">Delete</a>
    </td>
</tr>
<?php endforeach; ?>
</table>

<h2>Create Item</h2>

<form method="post" action="/items/store">
    <?= csrf_field() ?>
    <input type="text" name="name" placeholder="Name" required>
    <textarea name="description" placeholder="Description"></textarea>
    <button type="submit">Save</button>
</form>