<?php include('../crud3/includes/header.php') ?>

<?php
$id = isset($_GET['id']) ? $_GET['id'] : '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  extract($_REQUEST);
  if(!$id>0){
  if (!empty($fname) && !empty($lname) && !empty($gender) && !empty($state) && !empty($city) && !empty($dob) && !empty($pincode) && !empty($course) && !empty($email)) {

    $sql = "INSERT INTO student (fname, lname, gender, state, city, dob, pincode, course, email) 
        VALUES ('$fname', '$lname', '$gender', '$state', '$city', '$dob', '$pincode', '$course', '$email')";
    $result = $conn->query($sql);
    if ($result == true) {
      header('location:index.php?msg= data inserted');
      echo "inserted";
    } else {
      echo $conn->error;  
    }
  } else {
    echo "<p style='color:red'>All fields are required.</p>";
  }
}else{
  $sql= "UPDATE student SET fname='$fname',lname='$lname',gender='$gender',state='$state',city='$city',dob='$dob',pincode='$pincode',course='$course',email='$email' WHERE id=$id";
  $result= $conn->query($sql);
  if($result){
    header('Location:index.php?msg=data updated');
  } else {
    echo $conn->error;
  }
}
}
?>

<?php 
$sql= "SELECT * FROM student WHERE id='$id'";
$result= $conn->query($sql);
$row= $result->fetch_object();
?>
    <div class="action d-flex justify-content-between">
<a href="index.php">
            <button type="button" class="btn btn-primary">Back</button>
        </a> </div>
<form action="" method="post">
  <section class="h-100 bg-dark">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-cent  er h-100">
        <div class="col">
          <div class="card card-registration my-4">
            <div class="row g-0">
              <div class="col-xl-6 d-none d-xl-block">
                <img src="../crud3/assets/img.webp"
                  alt="Sample photo" class="img-fluid"
                  style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
              </div>

              <div class="col-xl-6">
                <div class="card-body p-md-5 text-black">
                  <h3 class="mb-5 text-uppercase"><?php echo ($id>0)? 'Update' : 'Add New' ?> Student</h3>
                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <div data-mdb-input-init class="form-outline">
                        <input type="text" name="fname" id="form3Example1m" class="form-control form-control-lg" value="<?php echo $row->fname; ?>"/>
                        <label class="form-label" for="form3Example1m">First name</label>
                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <div data-mdb-input-init class="form-outline">
                        <input type="text" name="lname" id="form3Example1n" class="form-control form-control-lg" value="<?php echo $row->lname; ?>"/>
                        <label class="form-label" for="form3Example1n">Last name</label>
                      </div>
                    </div>
                  </div>

                  <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                    <h6 class="mb-0 me-4">Gender: </h6>

                    <div class="form-check form-check-inline mb-0 me-4">
                      <input class="form-check-input" type="radio" name="gender" id="femaleGender" value="female" <?php echo ($row->gender == 'female')? 'checked' : ''; ?>/>
                      <label class="form-check-label" for="femaleGender">Female</label>
                    </div>

                    <div class="form-check form-check-inline mb-0 me-4">
                      <input class="form-check-input" type="radio" name="gender" id="maleGender" value="male" <?php echo ($row->gender == 'male')? 'checked' : ''; ?> />
                      <label class="form-check-label" for="maleGender">Male</label>
                    </div>

                    <div class="form-check form-check-inline mb-0">
                      <input class="form-check-input" type="radio" name="gender" id="otherGender" value="other" <?php echo ($row->gender == 'other')? 'checked' : ''; ?>/>
                      <label class="form-check-label" for="otherGender">Other</label>
                    </div>

                  </div>

                  <div class="row">
                    <div class="col-md-6 mb-4">

                      <select name="state" data-mdb-select-init>
                        <option value="">State</option>
                        <option value="uttarpredesh" <?php echo ($row->state == 'uttarpredesh')? 'selected': ''; ?> >uttarpredesh</option>
                        <option value="bihar" <?php echo ($row->state == 'bihar')? 'selected': ''; ?>>bihar</option>
                        <option value="haryana" <?php echo ($row->state == 'haryana')? 'selected': ''; ?>>haryana</option>
                      </select>

                    </div>
                    <div class="col-md-6 mb-4">

                      <select name="city" data-mdb-select-init>
                        <option value="">City</option>
                        <option value="aligarh" <?php echo ($row->city == 'aligarh')? 'selected': '' ; ?> >aligarh</option>
                        <option value="patna" <?php echo ($row->city == 'patna')? 'selected': '' ; ?>>patna</option>
                        <option value="palwal" <?php echo ($row->city == 'palwal')? 'selected': '' ; ?>>palwal</option>
                      </select>

                    </div>
                  </div>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <input type="date" name="dob" id="form3Example9" class="form-control form-control-lg" max="2012-12-31" value="<?php echo $row->dob; ?>" min="2012-m-d"/>
                    <label class="form-label" for="form3Example9">DOB</label>
                  </div>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <input type="number" name="pincode" id="form3Example90" class="form-control form-control-lg" value="<?php echo $row->pincode; ?>"/>
                    <label class="form-label" for="form3Example90">Pincode</label>
                  </div>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" name="course" id="form3Example99" class="form-control form-control-lg" value="<?php echo $row->course; ?>"/>
                    <label class="form-label" for="form3Example99">Course</label>
                  </div>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <input type="email" name="email" id="form3Example97" class="form-control form-control-lg" value="<?php echo $row->email; ?>"/>
                    <label class="form-label" for="form3Example97">Email ID</label>
                  </div>

                  <div class="d-flex justify-content-end pt-3">
                    <button type="reset" data-mdb-button-init data-mdb-ripple-init class="btn btn-light btn-lg">Reset all</button>
                    <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-warning btn-lg ms-2">Submit form</button>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</form>
<?php include('../crud3/includes/footer.php') ?>