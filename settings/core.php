<?php
//for header redirection
ob_start();

//start session
session_start();

//get the name of the current page
$current_file = $_SERVER['SCRIPT_NAME'];

//funtion to check for login
function check_login(){
	//check if login session exit
	if (!isset($_SESSION['user_id']))
	{
		//redirect to login page
    	header('Location: ../login/login.php');
	}
}

//function to check for permission
function check_permission(){
	//get session role
	if (isset($_SESSION['user_role'])) {
		//assign session to an array
		$uperm = $_SESSION['user_role'];
		if ($uperm != 1) {
			//redirect user
    		header('Location: ../login/login.php');
		}
	}
}

//function to return client's ip address
//code obtained from
//https://www.hashbangcode.com/article/get-ip-address-visitor-through-php

function getRealIpAddr(){
     if ( !empty($_SERVER['HTTP_CLIENT_IP']) ) {
      // Check IP from internet.
      $ip = $_SERVER['HTTP_CLIENT_IP'];
     } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']) ) {
      // Check IP is passed from proxy.
      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
     } else {
      // Get IP address from remote address.
      $ip = $_SERVER['REMOTE_ADDR'];
     }
     return $ip;
}

function add_to_notifs($note){
    $notifs = array();
    array_push($notifs, $note);
    $_SESSION['notifs'] = $notifs;
    echo "<script>window.history.back();</script>";
}

function display_error_message($errors){
    ?>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Notifications</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?php
                foreach($errors as $error){
                    echo $error."<br>";
                }
            ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <script>$('#exampleModal').modal('show')</script>
    <?php
    unset($_SESSION['notifs']);

}





?>
