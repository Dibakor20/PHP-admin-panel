<?php

  include "includes/header.php";

?>

    <div class="content">
        <div class="container-fluid">
     <!-- your content here -->

          <div class="row">
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Patient List</h4> 
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-warning">
                      <th>ID</th>
                      <th>Name</th>
                      <th>Phone No</th>
                      <th>Date</th>
                    </thead>
                    <tbody>
                    <?php
                      //read category from database
                      //crud=> 3 step ,1.sql .2.sql=>database,3.feedback
                         
                   $query = "SELECT * FROM patient_category";
                   $result= mysqli_query($db, $query) ;   
                   $count=0;
                    //step 2
                    while($row = mysqli_fetch_assoc($result) ){
                      $p_id=$row['p_id'];
                      $p_name=$row['p_name'];
                      $p_phone=$row['p_phone'];
                      $p_date=$row['P_date'];

                      $count++ ;
                      ?>
                      <tr>
                      <td><?php echo $count; ?></td>
                      <td><?php echo $p_name; ?></td>
                      <td><?php echo $p_phone; ?></td>
                      <td><?php echo $p_date; ?></td>
                      <td>
                        <a href="appointment.php?deletId=<?php echo $p_id;?>" class="btn btn-danger">Remove</a>
                    </td>
                    </tr>
                      <?php
                    }
                    ?>  
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-tabs card-header-warning">
                  <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                      <span class="nav-tabs-title">Add Patient</span>
                     
                     
                    </div>
                  </div>
                </div>
             <!-- form section start from here !-->  
             <form method="POST">
              <div class="mb-3"><br/>
                <input type="name" name="patient_name" class="form-control" id="exampleInputEmail1" placeholder="Patient Name">
              </div><br/>
              <div class="mb-3">
                <input type="number" name="patient_phone" class="form-control" id="exampleInputPassword1" placeholder="Phone No">
              </div>
              <div class="mb-3"><br/>
                <input type="date" name="patient_date" class="form-control" id="exampleInputPassword1" placeholder="Date">
              </div><br/>
              <button type="submit" name="add_patient" class="btn btn-primary">Submit</button>
            </form>
                    <!-- insert data from database start from here !-->
                    <?php
                    
                      if(isset($_POST['add_patient'])){
                        $patient_name= $_POST['patient_name'];
                        $patient_phone= $_POST['patient_phone'];
                        $patient_date= $_POST['patient_date'];
                        
                     $query= "INSERT INTO patient_category(p_name,p_phone,P_date) VALUES('$patient_name','$patient_phone','$patient_date')";
                    $result = mysqli_query($db,$query);
                        if($result){
                          header('location:appointment.php');
                        }
                        else{
                          echo "category insert error";
                        }
                      }

                    ?>
                    <!-- insert data from database end from here !-->

                      <!-- Delete operation start from here !-->
                <?php 
                if(isset($_GET['deletId'])){
                  $delet_id=$_GET['deletId'];

                $query="DELETE FROM patient_category WHERE p_id='$delet_id'";
                  $result= mysqli_query($db,$query);
                  if($result){
                    header('location:appointment.php');
                  }
                  else{
                    echo "category insert error";
                  }
                }
                
                ?>

                 <!-- Delete operation end from here !-->


              <!-- form section end  from here !-->  
                          </div>
                        </div>
                      </div>
                    </div>
              <!-- yoye content end from here!-->
        </div>
    </div>
     
<?php

  include "includes/footer.php";

?>