<?php
  	include '../includes/file-begin/file-begin.php';

    require_once "../../../src/scripts/configuration/init.php";

    require "../../../src/db/connect.php";
    require "../../../src/scripts/auth/auth-admin.php";
?>
    <link rel="stylesheet" href="../../styles/admin-views-styles/admin-dashboard.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <script src="../../src/js/utils/modals/edit-modal-controller.js" defer></script>
    <script src="../../src/js/utils/select/handle-admin-select.js" defer></script>
    <script type="module" src="../../src/js/controllers/control-admin-search.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
     <!-- CSS only from bootsrap-->
     <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
      crossorigin="anonymous"
    />
<?php
  include '../includes/headers/admin-view-header.php';
?>
<section class="main-section">
    <div class="main-container">
      <h1 style="color:white;">Welcome back!</h1>
      <h3 style="color:white;">Search for doctor or patient or appointment</h3>
      <form action="" class="search-area" id="form-search">
        <select id="D-P" name="select-list">
          <option value="None">Choose option</option>
          <option value="doctor">Doctor</option>
          <option value="patient">Patient</option>
          <option value="appointment">Appointment</option>
        </select>
        <input id="search-input" type="text" placeholder="" name="search" />
        <button type="submit"><img src="../../resources/images/tools/search.png" /></button>
      </form>
    </div>
    <div class="doctor-search-container">
        <h2>Results based on your search</h2>
        <div class="card-container">
        </div>
    </div>
   </div>
    <div class="edit-modal-doctor">
        <div class="edit-modal-content">
            <span class="edit-modal-close-button-doctor">×</span>
            <form class="admin-edit-form">
                <i class="fa-solid fa-file-pen"></i>
                <h2>Currently editing {{Doctor Name}}</h2>
                <div class="inputBox">
                    <span>First name</span><br>
                    <input type="text" name="Firstname" value="{{Doctor's first name}}">
                </div>
                <div class="inputBox">
                    <span>Last name</span><br>
                    <input type="text" name="Lastname" value="{{Doctor's last name}}">
                </div>
                <div class="inputBox">
                    <span>Phone</span><br>
                    <input type="text" name="Phone" value="{{Doctor's phone}}">
                </div>
                <div class="inputBox">
                    <span>Location</span><br>
                    <input type="text" name="Location" value="{{Doctor's location}}">
                </div>
                <div class="inputBox">
                    <span>Patients</span><br>
                    <input type="text" name="Patients" value="{{Doctor's patients}}">
                </div>
                <div class="inputBox">
                    <span>Publication</span><br>
                    <input type="text" name="Publications" value="{{Doctor's publications}}">
                </div>
                <div class="inputBox">
                    <span>Years of Experience</span><br>
                    <input type="text" name="Years" value="{{Doctor's years of experience}}">
                </div>
                <div class="inputBox">
                    <span>Short Bio</span><br>
                    <input type="text" name="Bio" maxlength="255"value="{{Doctor's Bio}}">
                </div>
                <div class="inputBox">
                    <span>Profile Picture</span><br>
                    <input type="file" name="Profile Picture">
                </div>
                <h4>⚠ Danger Zone</h4>
                <div class="inputBox">
                    <span>Username</span><br>
                    <input type="text" name="Username">
                </div>
                <div class="inputBox">
                    <span>Email</span><br>
                    <input type="text" name="Email">
                </div>
                <div class="inputBox">
                    <span>Password</span><br>
                    <input type="text" name="Password">
                </div>
                <div class="inputBox">
                    <input type="submit" name="Submit" value="Confirm changes">
                </div>
            </form>
        </div>
    </div>
    <div class="edit-modal-patient">
        <div class="edit-modal-content">
            <span class="edit-modal-close-button-patient">×</span>
            <form class="admin-edit-form">
            <i class="fa-solid fa-file-pen"></i>
            <h2>Currently editing {{Patient Name}}</h2>
            <div class="inputBox">
                <span>First name</span><br>
                <input type="text" name="Firstname" value="{{Patient's first name}}">
            </div>
            <div class="inputBox">
                <span>Last name</span><br>
                <input type="text" name="Lastname" value="{{Patient's last name}}">
            </div>
            <div class="inputBox">
                <span>Phone</span><br>
                <input type="text" name="Phone" value="{{Patient's phone}}">
            </div>
            <div class="inputBox">
                <span>Location</span><br>
                <input type="text" name="Location" value="{{Patient's location}}">
            </div>
            <div class="inputBox">
                <span>Profile Picture</span><br>
                <input type="file" name="Profile Picture">
            </div>
            <h4>⚠ Danger Zone</h4>
            <div class="inputBox">
                <span>Username</span><br>
                <input type="text" name="Username">
            </div>
            <div class="inputBox">
                <span>Email</span><br>
                <input type="text" name="Email">
            </div>
            <div class="inputBox">
                <span>Password</span><br>
                <input type="text" name="Password">
            </div>
            <div class="inputBox">
                <input type="submit" name="Submit" value="Confirm changes">
            </div>
        </form>
    </div>
    </div>
    <div class="edit-modal-appointment">
        <div class="edit-modal-content">
            <span class="edit-modal-close-button-appointment">×</span>
            <form class="admin-edit-form">
                <i class="fa-solid fa-file-pen"></i>
                <h2>Currently editing {{Appointment_id}}</h2>
                <div class="inputBox">
                    <span>Appointment date</span><br>
                    <input type="date" name="date" id="date">
                </div>
                <div class="inputBox">
                    <span>Appointment hour</span><br>
                    <select name="s-select">
                        <option>Select Hour</option>
                        <option value="9">9.00</option>
                        <option value="10">10.00</option>
                        <option value="11">11.00</option>
                        <option value="12">12.00</option>
                        <option value="13">13.00</option>
                        <option value="14">14.00</option>
                        <option value="15">15.00</option>
                        <option value="16">16.00</option>
                        <option value="17">17.00</option>
                        <option value="18">18.00</option>
                        <option value="19">19.00</option>
                        <option value="20">20.00</option>
                    </select>
                </div>
                <div class="inputBox">
                    <input type="submit" name="Submit" value="Confirm changes">
                </div>
            </form>
        </div>
    </div>
</section>
<?php
  include '../includes/footers/admin-view-footer.php';
?>

