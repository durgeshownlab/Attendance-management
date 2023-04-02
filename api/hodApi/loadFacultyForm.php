<?php
    $formType=$_POST['formType'];
    $output = "";
    if($formType == 'add')
    {
        $output .='
        <div class="form-title">
            <h2>Add Faculty</h2>
        </div>
        <form autocomplete="off" >
            <div class="form-part-up">
                <div class="input-field-container">
                    <input type="text" id="faculty-name" name="faculty-name" placeholder="Name" autocomplete="false" autofocus>
                    <input type="email" id="faculty-email" name="faculty-email" placeholder="Email" autocomplete="false">
                </div>
                <div class="input-field-container">
                <input type="text" id="faculty-reg-no" name="faculty-reg-no" placeholder="Reg. no" autocomplete="false">
                    <input type="text" id="faculty-number" name="faculty-number" placeholder="Phone Number" autocomplete="off">
                </div>
                <div class="input-field-container">
                    <input type="password" id="faculty-password" name="faculty-password" placeholder="Password" autocomplete="false">
                    <input type="password" id="faculty-confirm-password" name="faculty-confirm-password" placeholder="Confirm Password" autocomplete="false">
                </div>
                <div class="input-field-container">
                    <input type="file" id="faculty-profile-picture" name="faculty-profile-picture" disabled>
                </div>
            </div>

            <div class="form-part-down">
                <div class="input-field-container">
                    <button type="submit" id="add-faculty-submit-btn" name="add-faculty-submit-btn" data-type="add">Add</button>
                    <div class="modal-box-close">
                        <span>Close</span>
                    </div>
                </div>
            </div>
           
        </form>';
    }
    else if($formType == 'update')
    {
        session_start();
        include "../../dbconnect/connect.php";

        $facultyId=$_POST['facultyId'];

        $sql="select sno, reg_no, name, mobile_no, email, password from faculty_table where sno={$facultyId}";
        $reslt=mysqli_query($conn, $sql);
        $row=mysqli_fetch_assoc($reslt);
        $output .='
        <div class="form-title">
            <h2>Update Faculty</h2>
        </div>
        <form autocomplete="off">
            <div class="form-part-up">
                <div class="input-field-container">
                    <input type="text" value="'.$row['name'].'" id="faculty-name" name="faculty-name" placeholder="Name" autocomplete="false">
                    <input type="email" value="'.$row['email'].'" id="faculty-email" name="faculty-email" placeholder="Email" autocomplete="false">
                </div>
                <div class="input-field-container">
                <input type="text" value="'.$row['reg_no'].'" id="faculty-reg-no" name="faculty-reg-no" placeholder="Reg. no" autocomplete="false">
                    <input type="text" value="'.$row['mobile_no'].'" id="faculty-number" name="faculty-number" placeholder="Phone Number" autocomplete="off">
                </div>
                <div class="input-field-container">
                    <input type="password" value="'.$row['password'].'" id="faculty-password" name="faculty-password" placeholder="Password" autocomplete="false">
                    <input type="password" value="'.$row['password'].'" id="faculty-confirm-password" name="faculty-confirm-password" placeholder="Confirm Password" autocomplete="false">
                </div>
            </div>

            <div class="form-part-down">
                <div class="input-field-container">
                    <button type="submit" id="update-faculty-submit-btn" name="update-faculty-submit-btn" data-id="'.$row['sno'].'">Update</button>
                    <div class="modal-box-close">
                        <span>Close</span>
                    </div>
                </div>
            </div>
           
        </form>';
    }


    echo $output;
?>