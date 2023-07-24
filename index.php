<!-- thank you -->
<!-- second attemptafa -->
<?php 
$servername="localhost";
$username="root";
$password="";
$database="notesdb";
$insert=false;
$emp=false;
$upd=false;
$d=false;
  $conn=mysqli_connect($servername,$username,$password,$database);
  if(!$conn)
  {
    die("Database not found". mysqli_connect_error());
  }

  if($_SERVER["REQUEST_METHOD"]=="POST")
  {
    if(isset($_POST['editsno'])){

      $sno=$_POST['editsno'];
      $title=$_POST["titleedit"];
    $desc=$_POST["descriptionedit"];

    
    // Update the record if it is the set of it
    $sql="UPDATE `notes` SET `title` = '$title', `description` = '$desc' WHERE `notes`.`SrNo` = '$sno'";
    $result = mysqli_query($conn,$sql);
    $upd=true;
    }
    else
    if(isset($_POST['delno'])){

      $sno=$_POST['delno'];
      $sql="DELETE FROM `notes` WHERE `notes`.`SrNo` = '$sno'";
    

    $result = mysqli_query($conn,$sql);
    $d=true;


    }
    else{

      $title=$_POST["title"];
      $desc=$_POST["description"];
      if($title!=""&&$desc!=""){
        $sql="INSERT INTO `notes` (`title`, `description`, `Timestamp`) VALUES ('$title', '$desc', current_timestamp());";
      $result=mysqli_query($conn, $sql);
      if($result)
      {
        $insert=true;
      }
      else{
        echo "not inserted";
  
      }
  
      }
      else{
  
        $emp=true;
  
      }
  
    }
        
  }
 
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" class="css">
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

    <title>BeMyNotes</title>
  </head>
  <body>

 
  <!-- Edit modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal">
  Edit Modal
</button> -->

<!--Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit the Note</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


      <form action="index.php" method="POST">
        <input type="hidden" name="editsno" id="editsno">
        <div class="form-group">
          <label for="exampleInputTitleedit">Notes Title</label>
          <input type="text" class="form-control" id="titleedit" aria-describedby="emailHelp" placeholder="Enter title" name="titleedit">
        </div>
        <div class="form-group">
            <label for="Descriptonedit">Notes Description</label>
            <textarea class="form-control" id="descriptionedit" rows="3" placeholder="Description.." name="descriptionedit"></textarea>
          </div>
       
        

        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update Note</button>
      </div>
      </form>
        


      </div>
      
    </div>
  </div>
</div>


<!-- delete modal -->

<!-- delete modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#deleteModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Delete Record</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="index.php" method="POST">
        <p class="text-center">Do you want to delete the Note?</p>
        <input type="hidden" name="delno" id="delno">

        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="Submit" class="btn btn-danger">Delete</button>
      </div>
      </form>
      </div>
  
    </div>
  </div>
</div>
    

<!-- naivagation bar -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php"> <img src="logo1.png" width=40px alt="logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home </a>
          
        </li>
          <li class="nav-item active">
            <a class="nav-link" href="aboutus.php">About Us</a>
            
          </li>
     
        
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>
  <?php
  if($insert)
  {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  </strong> <strong>Success!</strong> The Note is recorded. 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
  }
  if($emp)
  {
   

  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Fields are Empty</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
  }

  if($upd)
  {
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Success!</strong> The Note is Updated Successfully. 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';


  }

  if($d)
  {

   echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> The Note is Deleted . 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
  }
  ?>

  <div class="container">
    <h2>Add your notes</h2>
    

    <form action="index.php" method="POST">
        <div class="form-group">
          <label for="exampleInputTitle">Notes Title</label>
          <input type="text" class="form-control" id="exampleInputTitle" aria-describedby="emailHelp" placeholder="Enter title" name="title">
        </div>
        <div class="form-group">
            <label for="Descripton">Notes Description</label>
            <textarea class="form-control" id="Descipton" rows="3" placeholder="Description.." name="description"></textarea>
          </div>
       
        <button type="submit" class="btn btn-primary">Note it</button>
      </form>
  </div>
  <div class="container my-3">
    <h3> My Notes</h3>
    <table class="table table-striped table-dark table-hover" id="myTable">
        <thead>
          <tr>
            <th scope="col">Sr.No</th>
            <th scope="col">Title</th>
            <th scope="col">Descripton</th>
            <th scope="col">Operations</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql="SELECT * FROM `notes`";
          $result=mysqli_query($conn,$sql);
          $sn=1;
          while($row = mysqli_fetch_assoc($result)){
            echo '<tr>
            <th scope="row">
            </td>'.$sn.'</td>
            <td>'. $row["title"]. '</td>
            <td>'. $row["description"]. '</td>
            <td class="text-center"><button type="button" class="edit btn btn-primary" id='. $row["SrNo"].'>Edit</button> <button type="button" class="delete btn btn-danger" id='. $row["SrNo"].'>Delete</button></td>
          </tr>';
          $sn++;
          }
          ?>
          
          
        </tbody>
      </table>
  </div>

  <!-- table to show tasks -->
  





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script>
    // $(document).ready(function() {
    //   $('#myTable').DataTable();
  
    
    // });

    let table = new DataTable('#myTable');
    </script>
    <script>
      let edits=document.getElementsByClassName('edit');
      Array.from(edits).forEach((element)=>{
        element.addEventListener("click",(e)=>{
          
          let tr=e.target.parentNode.parentNode;
          let tit=tr.getElementsByTagName("td")[0].innerText;
          let des=tr.getElementsByTagName("td")[1].innerText;
          console.log(tit,des);
            titleedit.value=tit;
            descriptionedit.value=des;
            editsno.value=e.target.id;
           
          $('#editModal').modal('toggle');



      })
      })


      let deletes=document.getElementsByClassName('delete');
      Array.from(deletes).forEach((element)=>{
        element.addEventListener("click",(e)=>{
            delno.value=e.target.id;
            $('#deleteModal').modal('toggle');

      })
      })
 

    </script>
  
  
  
  
  </body>


  
 

</html>