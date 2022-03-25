<?php
    include("function.php");
    $object = new crudApp();

    if(isset($_POST['btn']))
    {
        $return_msg = $object->add_data($_POST);
    }
    $students = $object->display_data();

    if(isset($_GET['status']))
    {
        if($_GET['status']='delete')
        {
            $delete_id = $_GET['id'];
            $delete_msg = $object->delete_data($delete_id);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD APP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container my-4 p-4 shadow">
        <h2><a style= "text-decoration: none;" href="index.php">Student Information</a></h2>
        <?php if(isset($delete_msg)){echo $delete_msg;} ?>
        <form class="form" action="" method="post" enctype ="multipart/form-data">
            <?php if(isset($return_msg)){echo $return_msg;} ?>
            <input class= "form-control mb-2" type="text" name="std_name" id="" placeholder= "Enter Your Name...">
            <input class= "form-control mb-2" type="number" name="std_roll" id="" placeholder= "Enter Your Roll...">
            <label for="image">Upload Your Image</label>
            <input class= "form-control mb-2" type="file" name="std_img" id="">
            <input style="font-weight: bold;" class="form-control bg-warning" type="submit" value = "Add Information" name="btn" id="">
        </form>
    </div>
    <div class="container my-4 p-4 shadow">
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Roll</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while($student= mysqli_fetch_assoc($students)){?>
                <tr>
                    <td><?php echo $student['Id']; ?></td>
                    <td><?php echo $student['std_name']; ?></td>
                    <td><?php echo $student['std_roll']; ?></td>
                    <<td><img style="max-width:100%; width:138px;"src="./upload/<?php echo $student['std_img']; ?>" alt=""></td>
                    <td>
                        <a class= "btn btn-success"href="edit.php?status=edit&&id=<?php echo $student['Id']; ?>">Edit</a>
                        <a class= "btn btn-warning"href="?status=delete&&id=<?php echo $student['Id']; ?>">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>