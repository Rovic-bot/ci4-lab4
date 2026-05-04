<h2>Create Item</h2>

<form method="post" action="/items/store">
    <?= csrf_field() ?>
    <input type="text" name="name" placeholder="Name" required>
    <textarea name="description" placeholder="Description"></textarea>
    <button type="submit">Save</button>
</form>

<a href="/items">Back to list</a>
