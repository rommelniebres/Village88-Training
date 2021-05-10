<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a new product | Semi Restful Route Demo</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <div class="new">
        <h1>Add a new product</h1>
        <span class="error"><?= $this->session->flashdata('error');?></span>
        <form action='/products/create' method='post'>
            <label> Name: </label><input type="text" name="name" >
            <label>Description: </label><input type="text" name="description" >
            <label>Price: </label><input type="text" name="price" >
            <input class="create-update" type="submit" value="Create" >
        </form>
        <a class="back" href="/products">Go back</a>
    </div>
</body>
</html>