<h2>User List</h2>  
<?php
    if (!empty($_GET['msg'])) 
    {
        $msg= unserialize(urldecode($_GET['msg']));
        foreach ($msg as $key => $value) {
            echo "<span style='color:green; font-weight:bold'>".$value."</span>";
        }
    }    
?>
<form action="<?php echo BASE_URL; ?>/User/deleteUser/<?php echo $value['UserId']; ?>" method="post">
<table>
    <tr>
        <th width="20%">Serial</th>
        <th width="30%">Username</th>
        <th width="30%">Level</th>
        <th width="30%">Action</th>
    </tr>
<?php
    $i=0;
foreach ($users as $key => $value ) 
{
    $i++;
?>    
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $value['username']; ?></td>
        <td>
            <?php
                if ($value['level']==1) 
                {
                    echo "Admin";
                }  
                elseif ($value['level']==2) 
                {
                    echo "Author";
                }
                else 
                {
                    echo "Contributer";
                }
            ?>
        </td>
        <td>
            <a href="<?php echo BASE_URL;?>/User/deleteUser/<?php echo $value['userId']; ?>" onclick="return confirm('Are you sure to Delete !');" >Delete</a>
        </td>
    </tr>

<?php } ?> 

</table>
</form>