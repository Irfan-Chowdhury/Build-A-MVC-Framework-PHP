<h2>Welcome in Admin Panel</h2>
<?php
    // echo "Welcome ".$user['username'];
    echo "Welcome ".Session::get("username");
?>