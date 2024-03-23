//here will be the logic that decides which input field to be displayed

// 1.1 Stduent Regesitation fields 
// First Name + Last Name 
// Enrollemnt No
// GR. No.
// Email
// Passoword
// Confirm Password

// 2.1 Faculty Regesitation fields
// First Name + Last Name
// Faculty ID
// Email
// Passoword
// Confirm Password

// 3.1 Parent Regesitation fields
// First Name + Last Name
// Email
// passoword

//onselect of the dropdown of will select one of the three functions below

function select_student(){

    var html = `<div class="input-group mb-2">
    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Full Name" name="full_name" id="full_name">
</div>

<div class="input-group mb-2">
    <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="Enrollment No." name="enr_no" id="enr_no">
</div>
<div class="input-group mb-2">
    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Email Address" name="email" id="email">
</div>
<div class="input-group mb-3">
    <input type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Password" name="password" id="password">
</div>

<div class="input-group mb-3">
    <button class="btn btn-lg btn-primary w-100 fs-6" value="Submit">Sign Up</button>
</div>
<div class="row">
    <small class="d-flex justify-content-center">Already a user ? <a href="login-page.html"> Login</a></small>
</div>`



document.getElementById("input-group-js-signup").innerHTML = html;
document.getElementById("dropdown-signup-selector").innerText = "Student";

}

function select_parent(){
    var html =           `    <div class="input-group mb-2">
    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Full Name" name="full_name" id="full_name">
</div>

<div class="input-group mb-2">
    <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="Child's Enrollment No." name="child_id" id="child_id">
</div>
<div class="input-group mb-2">
    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Email Address" name="email" id="email">
</div>
<div class="input-group mb-3">
    <input type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Password" name="password" id="password">
</div>

<div class="input-group mb-3">
    <button class="btn btn-lg btn-primary w-100 fs-6" value="Submit">Sign Up</button>
</div>
<div class="row">
    <small class="d-flex justify-content-center">Already a user ? <a href="login-page.html"> Login</a></small>
</div>

</div>`



document.getElementById("input-group-js-signup").innerHTML = html;
document.getElementById("dropdown-signup-selector").innerText = "Parent";

}

function select_faculty(){
    var html = `                        <div class="input-group mb-2">
    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Full Name" name="full_name" id="full_name">
</div>

<div class="input-group mb-2">
    <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="Faculty ID" name="fac_id" id="fac_id">
</div>
<div class="input-group mb-2">
    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Email Address" name="email" id="email">
</div>
<div class="input-group mb-3">
    <input type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Password" name="password" id="password">
</div>

<div class="input-group mb-3">
    <button class="btn btn-lg btn-primary w-100 fs-6" value="Submit">Sign Up</button>
</div>
<div class="row">
    <small class="d-flex justify-content-center">Already a user ? <a href="login-page.html"> Login</a></small>
</div>`



document.getElementById("input-group-js-signup").innerHTML = html;
document.getElementById("dropdown-signup-selector").innerText = "Faculty";

}

// <!-- input group that will be affected by the js file -->


                        
