<h2>Add New Category</h2>
<?php  
    foreach ($catById as $key => $value) {
?>

<form action="<?php echo BASE_URL; ?>/Admin/updateCategory/<?php echo $value['categoryId']; ?>" method="post">
    <table>
        <tr>
            <td>Category Name</td>
            <td><input type="text" name="categoryName" required="1" value="<?php echo $value['categoryName']; ?>"></td>
        </tr>
        <tr>
            <td>Category Title</td>
            <td><input type="text" name="title" required="1" value="<?php echo $value['title']; ?>"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="submit" value="Update"></td>
        </tr>
    </table>
</form>

<?php } ?>