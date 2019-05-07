<!-- ================================== -->
Login <hr>
<div class="loginform">
    <form action="<?php echo BASE_URL; ?>/Login/loginAuth" method="post">
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" placeholder="Username..."></td>
            </tr>

            <tr>
                <td>Password</td>
                <td><input type="password" name="password" placeholder="Password..."></td>
            </tr>
            
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Login"></td>
            </tr>
        
        </table>
    </form>
</div>



<!-- ================================== -->
