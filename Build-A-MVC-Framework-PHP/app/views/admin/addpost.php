<h2>Add New Article</h2>

<?php
if (isset($postErrors)) 
{
    foreach ($postErrors as $key => $value) 
    {
        echo '<div style="color:red;border:1px solid red; padding:5px 10px; margin:5px;">';
        switch ($key) 
        {
            case 'title':
                foreach ($value as $val ) 
                {
                    echo "Title: ".$val."<br>";
                }
                break;
            
            case 'content':
                foreach ($value as $val ) 
                {
                    echo "content: ".$val."<br>";
                }
                break;
            
            case 'cat':
                foreach ($value as $val ) 
                {
                    echo "Category: ".$val."<br>";
                }
                break;
            
            default:
                # code...
                break;
        }
    }
     echo "</div>";
}
?>

<form action="<?php echo BASE_URL; ?>/Admin/addNewPost" method="post">
    <table>
        <tr>
            <td>Title</td>
            <td><input id="postinput" type="text" name="title" ></td>
        </tr>
        
        <tr>
            <td>Content</td>
            <td>
                <textarea name="content"></textarea>
            </td>
            
        </tr>
        
        <tr>
            <td>Category</td>
            <td>
                <select name="cat" class="cat">
                    <option>--Select Option--</option>
                <?php
                    foreach ($catlist as $key => $value) {
                ?>
                    <option value="<?php echo $value['categoryId'];?>"><?php echo $value['categoryName']; ?></option>
                    
                <?php } ?>
                
                </select>
            </td>
        </tr>
        
        <tr>
            <td></td>
            <td><input type="submit" name="submit" value="Save"></td>
        </tr>
    </table>
</form>