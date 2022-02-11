<?php 
if ($_GET) {
  $id = $_GET['id'];
  include_once "db.php";
  $select_query = mysqli_query($conn,"SELECT * FROM list WHERE id = '$id'");
  $row = mysqli_fetch_row($select_query);
}

if ($_POST) {  
  $id = $_POST['id'];
  $title = $_POST['title'];
  $content = $_POST['content'];
  //$now = time();
  $timestamp = date("Y-m-d H:i:s");
  include_once "db.php";
  mysqli_query($conn,"UPDATE list SET title = '$title', content = '$content', modified = '$timestamp' WHERE id = '$id'");
  var_dump($id);
  header("Location: index.php");
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
      <div class="row bg-secondary text-light p-5" style="border-bottom: 8px solid #6495ED;">
            <h1><?php echo strtoupper("My daily todo-list") ?></h1>
      </div>
    </div>
    <div class="container">
      <div class="row mt-5 text-dark">

        <div class="col-sm-4"></div>

        <div class="col-sm-4 p-3 rounded" style="background-color: #f2f4f4;">

          <!-- form to modifying a todo list item -->
          <form action="edit.php" method="POST">
            <input type="text" name="id" value="<?php echo $row[0]; ?>" hidden>
            <div class="mb-3">
              <label for="inputTitle" class="form-label">Title</label>
              <input type="text" class="form-control" value="<?php echo $row[1]; ?>" name="title">
            </div>
            <div class="mb-3">
              <label for="inputContent" class="form-label">Content</label>
              <textarea class="form-control" rows="3" name="content"><?php echo $row[2]; ?></textarea>
            </div>
            <div class="mb-1">
              <button type="submit" class="btn btn-success">Save changes</button>
            </div>
          </form>

        </div>
      </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
