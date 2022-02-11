<?php 
if ($_POST) {
  
  $title = $_POST['title'];
  $content = $_POST['content'];
  include_once "db.php";
  mysqli_query($conn,"INSERT INTO list (title,content) VALUES ('$title','$content')");
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- FontAwesome Kit -->
    <script src="https://kit.fontawesome.com/cf3e3a7ec6.js" crossorigin="anonymous"></script>

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container-sm-fluid">
      <div class="row bg-secondary text-light p-5" style="border-bottom: 9px solid #6495ED;">
            <h1><?php echo strtoupper("My daily todo-list") ?></h1>
      </div>
    </div>
    <div class="container">
      <div class="row mt-5 align-items-center text-dark">
        <div class="col-sm-3 p-3 rounded" style="background-color: #f2f4f4;">

          <!-- form to adding new todo list item -->
          <form action="index.php" method="POST">
            <div class="mb-3">
              <label for="inputTitle" class="form-label">Title</label>
              <input type="text" class="form-control" name="title">
            </div>
            <div class="mb-3">
              <label for="inputContent" class="form-label">Content</label>
              <textarea class="form-control" rows="3" name="content"></textarea>
            </div>
            <div class="mb-1">
              <button type="submit" class="btn btn-success">Save</button>
            </div>
          </form>

        </div>

        <div class="col-sm-1 align-middle"><img src="img/right_arrow.png" alt="" width="80"></div> <!-- space between divs-->

        <div class="col-sm-8 p-2 rounded" style="background-color: #f2f4f4;">
          <!-- table that shows todo-list items -->
          <table class="table">
            <thead>
              <tr>
                <th scope="col" class="text-center">Id</th>
                <th scope="col" class="text-center">Title</th>
                <th scope="col" class="text-center">Created</th>
                <th scope="col" class="text-center">Modified</th>
                <th scope="col" class="text-center">Edit</th>
                <th scope="col" class="text-center">Delete</th>
                <th scope="col" class="text-center">Done</th>
              </tr>
            </thead>

            <tbody>
              <?php include "db.php"; ?>
              <?php $query = mysqli_query($conn, "SELECT * FROM list"); ?>
              <?php while ($data = mysqli_fetch_row($query)) { ?>
              <?php if (!strcmp($data[5],'checked')) {?>
                      <tr style="background-color: #b2babb">
              <?php } else { ?>
                      <tr>
              <?php } ?>
                <th scope="row" class="text-center"><?php echo $data[0] ?></th>
                <td class="text-center"><?php echo $data[1] ?></td>
                <td class="text-center"><?php echo $data[3] ?></td>
                <td class="text-center"><?php echo $data[4] ?></td>
                <td class="text-center"><a href="edit.php?id=<?php echo $data[0] ?>"><i class="far fa-edit"></i></a></td>
                <td class="text-center"><a href="delete.php?id=<?php echo $data[0] ?>"><i class="far fa-trash-alt"></i></a>

                <?php if (strcmp($data[5],'checked')) {?>
                        <td class="text-center"><input type="checkbox" <?php echo $data[5] ?>></td>
                <?php } else { ?>
                        <td class="text-center"><input type="checkbox" <?php echo $data[5] ?>></td>
                <?php } ?>
              </tr>
              <?php } ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
