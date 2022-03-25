<?php
    include("function.php");
    $object = new crudApp();

    $students = $object->display_data();

    if(isset($_GET['status']))
    {
        if($_GET['status']='edit')
        {
            $id = $_GET['id'];
            $retuendata = $object->display_data_by_id($id);
        }
    }
    if(isset($_POST['e_btn']))
    {
        $msg = $object->update_data($_POST);
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
        <form class="form" action="" method="post" enctype ="multipart/form-data">
            <?php if(isset($msg)){echo $msg;} ?>
            <input class= "form-control mb-2" type="text" name="e_std_name" id="" value= "<?php echo $retuendata['std_name'] ?>">
            <input class= "form-control mb-2" type="number" name="e_std_roll" id="" value= "<?php echo $retuendata['std_roll'] ?>">
            <label for="image">Upload Your Image</label>
            <input class= "form-control mb-2" type="file" name="e_std_img" id="">
            <input type="hidden" value= "<?php echo $retuendata['Id'] ?>" name="std_id" id="">
            <input style="font-weight: bold;" class="form-control bg-warning" type="submit" value = "Update Information" name="e_btn" id="">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>