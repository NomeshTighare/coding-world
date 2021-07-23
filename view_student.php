<?php
    $thisPage = "View Student";

    include 'config.php';

    if (!isset($_SESSION['auth'])) 
    {
        header("Location:sign-in.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'includes/head.php'; ?>
</head>

<body>
    <?php include 'includes/navbar.php'; ?>

    <div class="view">
        <div class="d-flex">
            <?php
      // this is turnory oprator in php, it will check if session  is set then it show logout button other wise login
      echo (empty($_SESSION['auth'])) 
        ?
          '<a class="nav-link" href="sign-in.php">
          <button class="btn btn-outline-success" type="submit">Login</button></a>' 
        : 
          '<a class="nav-link" href="logout.php">
          <button class="btn btn-outline-success" type="submit">Logout</button></a>';
      ?>
        </div>

        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home.php">Home</a></li>

                <li class="breadcrumb-item active" aria-current="page">View Students</li>
            </ol>
        </nav>
        <h2 class="h1 quick  text-primary">Student List</h2>
        <table class="table table-success  table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Address</th>
                    <th scope="col">DOB</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Blood Group</th>
                    <th scope="col">Created</th>
                    <th scope="col">Updated</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql="select * from students where auth_id=".$_SESSION["auth"]["auth_id"]."";
                $result=$conn->query($sql);
                $sr=0;
                if($result->num_rows>0)
                {
                    while($row=$result->fetch_assoc())
                    {
                        $sr++;
            ?>
                <tr>
                    <th scope="row"><?php echo $sr; ?></th>
                    <td><?php 
                        if(!empty($row['profile_img']))
                        {
                            echo '<img src='.$row["profile_img"].'  width="100px" height="100px" />';
                        }
                        else{
                            echo '<img src="img/profile/dummy.png" width="100px" height="100px" />';
                        }
                    ?></td>
                    <td><?php echo $row['fullname']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['mobile']; ?></td>
                    <th><?php echo $row['address']; ?></th>
                    <th><?php echo $row['dob']; ?></th>
                    <td><?php echo $row['gender']; ?></td>
                    <td><?php echo $row['blood']; ?></td>
                    <td><?php echo $row['created']; ?></td>
                    <td><?php if($row['updated']!=NULL){echo $row['updated'];}else{echo "N.A.";} ?></td>
                    <td>
                        <a href="delete_student.php?q=<?php echo $row['con_id'];?>&f=<?php echo $row['profile_img'];?>"
                            onclick="return confirm('Are your sure you want to delete this record ?');"><i
                                class="fa fa-trash mr-2 fa-2x text-danger"></i></a>
                        <a href="edit_student.php?q=<?php echo $row['con_id'];?>&f=<?php echo $row['profile_img'];?>"
                            onclick="return confirm('Are your sure you want to edit this record ?');"><i
                                class="fa fa-edit fa-2x text-success"></i></a>
                    </td>
                </tr>
                <?php
                }
                }
            else{
                echo "<h2 class='text-danger m-2'>Data Not Found</h2>";
            }
            ?>
            </tbody>
        </table>
    </div>

    <?php include 'includes/footer.php'; ?>
    <?php include 'includes/script.php'; ?>

</body>

</html>