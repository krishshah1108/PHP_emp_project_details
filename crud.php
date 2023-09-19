<?php
class crud
{
    private $serverName = "localhost";
    private $userName = "root";
    private $password = "";
    private $dbName = "C_divison_php";
    public $con;

    public function __Construct()
    {
        $this->con = new mysqli($this->serverName,$this->userName,$this->password,$this->dbName);
        if(!$this->con)
        {
            echo "Error";
        }
    }

    // public function regInsert($regArray)
    // {
    //     $insert = "INSERT INTO reg_form VALUES('$regArray[0]','$regArray[1]','$regArray[2]','$regArray[3]','$regArray[4]')";
    //     $run = $this->con->query($insert);
    //     if(!$run)
    //     {
    //         echo "Error in insering the record.";
    //     }
    //     return $run;
    // }
    // public function regDisplay()
    // {
    //     $display = "SELECT * FROM reg_form";
    //     $run = $this->con->query($display);
    //     return $run;
    // }

    public function logincheck_empDet()
    {
        $display = "SELECT * FROM emp_details";
        $run = $this->con->query($display);
        return $run;
    }
    public function empDet_display($EMP_NO)
    {
        $display = "SELECT * FROM emp_details WHERE emp_no = $EMP_NO ";
        $run = $this->con->query($display);
        return $run;
    }

    public function projDet_insert($projInsert)
    {
        $insert = "INSERT INTO project_details 
        VALUES('$projInsert[0]','$projInsert[1]','$projInsert[2]',$projInsert[3],'$projInsert[4]')";
        $run = $this->con->query($insert);
        if(!$run)
        {
            echo "Error in insering the record.";
        }
        return $run;
    }
    public function projDet_display()
    {
        $display = "SELECT * FROM project_details";
        $run = $this->con->query($display);
        return $run;
    }


    public function empDet_insert($empInsert)
    {
        $insert = "INSERT INTO emp_details 
        VALUES('$empInsert[0]','$empInsert[1]','$empInsert[2]','$empInsert[3]','$empInsert[4]','$empInsert[5]','$empInsert[6]','$empInsert[7]','')";
        $run = $this->con->query($insert);
        if(!$run)
        {
            echo "Error in insering the record.";
        }
        return $run;
    }

    public function projStatus_insert($projStatInsert)
    {   
        $insert = "INSERT INTO project_status 
        VALUES('$projStatInsert[0]','$projStatInsert[1]','$projStatInsert[2]','$projStatInsert[3]','$projStatInsert[4]')";
        $run = $this->con->query($insert);
        if(!$run)
        {
            echo "Error in insering the record.";
        }
        return $run;
    }

    public function projStatus_display()
    {
        $display = "SELECT * FROM project_status";
        $run = $this->con->query($display);
        return $run;
    }
    public function empProfile_display()
    {
        $display = "SELECT * FROM emp_details";
        $run = $this->con->query($display);
        return $run;
    }

    public function upd_emp_det_old($EMP_NO)
    {
        $display = "SELECT * FROM emp_details WHERE emp_no = '$EMP_NO' ";
        $run = $this->con->query($display);
        return $run;
    }
    public function upd_emp_det_new($updaArrPar)
    {
        $update = "UPDATE emp_details SET emp_email = '$updaArrPar[0]',emp_type = '$updaArrPar[1]',emp_name = '$updaArrPar[2]',emp_cn = '$updaArrPar[3]',emp_joinDate = '$updaArrPar[4]',emp_workPlace = '$updaArrPar[5]' 
        WHERE emp_no = '$updaArrPar[6]' ";
        $run = $this->con->query($update);
        return $run;
    }

    public function delEmpDet($emp_no)
    {
        $delete = "DELETE FROM emp_details WHERE emp_no = '$emp_no' ";
        $run = $this->con->query($delete);
        return $run;
    }

    public function changePwd($newPwd,$emp_no)
    {
        $changePwd = "UPDATE emp_details SET password = $newPwd WHERE emp_no = '$emp_no'";
        $run = $this->con->query($changePwd);
        return $run;
    }

    private $fileName;
    private $fileType;
    private $fileSize;
    private $fileTmpName;
    private $folder = "photoUpload/";

    public function imageUpload($files,$emp_no)
    {
        $this->fileName = $files['image']['name'];
        $this->fileType = $files['image']['type'];
        $this->fileSize = $files['image']['size'];
        $this->fileTmpName = $files['image']['tmp_name'];
        
        if($this->fileSize < 5242880)
        {
            if($this->fileType == "image/jpg" || $this->fileType == "image/jpeg" || $this->fileType == "image/png")
            {

                if(move_uploaded_file($this->fileTmpName,$this->folder.$this->fileName))
                {
                    $imgDis =  "SELECT image FROM emp_details WHERE emp_no = $emp_no";
                    $run = $this->con->query($imgDis);
                    $output = mysqli_fetch_array($run);
                    unlink("photoUpload/".$output[0]);
                    
                    $imageUpdate = "UPDATE emp_details SET image='$this->fileName' WHERE emp_no =$emp_no " ;
                    $run = $this->con->query($imageUpdate);
                    header("location:dashboard.php?emp_no=$emp_no");
                    return $run;
                }
            }
            else{
                echo "<h3>Only image having extensions '.jpg' , '.png' , '.jpeg' are allowed.<br> ";
                echo "Error in uploading the image.</h3>";
                header("profileView.php?emp_no = $emp_no");    
            }
        }
        else{
            echo "<h3>Image size must be less than 5MB <br>";
            echo "Error in uploading the image.</h3>";
            header("profileView.php?emp_no = $emp_no");
        }
    }

}
?>