<?php require "header.html" ?>

<h1>New Repository</h1>
<form method="post" action="create.php">
    <label form="name">Name</label>
    <input type="text" name="name" id="name">

    <label form="description">Description</label>
    <textarea name="description" id="description"></textarea>
    <button>Submit</button>
</form>
<?php require "footer.html" ?>