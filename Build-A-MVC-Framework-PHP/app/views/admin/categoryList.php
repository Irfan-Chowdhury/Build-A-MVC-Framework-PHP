<h2>Category List</h2>  
<?php
    if (!empty($_GET['msg'])) 
    {
        $msg= unserialize(urldecode($_GET['msg']));
        foreach ($msg as $key => $value) {
            echo "<span style='color:green; font-weight:bold'>".$value."</span>";
        }
    }
?>

<table>
    <tr>
        <th>Serial</th>
        <th>Category Name</th>
        <th>Category Title</th>
        <th>Action</th>
    </tr>
<?php
    $i=0;
foreach ($cat as $key => $value ) 
{
    $i++;
?>    
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $value['categoryName']; ?></td>
        <td><?php echo $value['title']; ?></td>
        <td>
            <a href="<?php echo BASE_URL;?>/Admin/editCategory/<?php echo $value['categoryId']; ?>">Edit</a>
            <a onclick="return confirm('Are you sure to Delete !');" href="<?php echo BASE_URL;?>/Admin/deleteCategory/<?php echo $value['categoryId']; ?>">Delete</a>
        </td>
    </tr>

<?php } ?> 

</table>