<?php
include('header.php');
?>

<?php
include 'db_conn.php';
?>

<?php

if(isset($_GET['id'])){

    $id = $_GET['id'];
    
    $query = "SELECT * FROM `students` WHERE `id` = '$id'";

    $result = mysqli_query($conn, $query);

    if(!$result){
        die("query failed".mysqli_error());
    }
    else{
        $row = mysqli_fetch_assoc($result);

    }

}

?>

<?php

    if(isset($_POST['update_students'])){

        if(isset($_GET['id_new'])){
            $idnew = $_GET['id_new'];
        }

        $f_name = $_POST['first_name'];
        $l_name = $_POST['last_name'];
        $age = $_POST['age'];

        $query = "UPDATE `students` SET `first_name`='$f_name',`last_name`='$l_name',`age`='$age' WHERE `id`= '$idnew'";

        $result = mysqli_query($conn, $query);

        if(!$result){
            die("query failed".mysqli_error());
        }
        else{
            header('Location: home.php?update_msg= You have successfully updated the data.');
        }

    }
?>


<form action="update.php?id_new=<?php echo $id; ?>" method="post">
    <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" name="first_name" class="form-control" value="<?php echo $row['first_name'] ?>"> 
    </div>
        <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" name="last_name" class="form-control" value="<?php echo $row['last_name'] ?>"> 
    </div>
    <div class="form-group">
        <label for="age">Age</label>
        <input type="text" name="age" class="form-control" value="<?php echo $row['age'] ?>"> 
    </div>
    <input type="submit" class="btn btn-success" name="update_students" value="UPDATE">
</form>



<?php
include('footer.php');
?>



