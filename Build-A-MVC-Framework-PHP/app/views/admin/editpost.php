<h2>Update Article</h2>

<?php 
    foreach ($postbyid as $key => $value) {
?>
<form action="<?php echo BASE_URL; ?>/Admin/updateArticle/<?php echo $value['postId']; ?>" method="post">
    <table>
        <tr>
            <td>Title</td>
            <td><input id="postinput" type="text" name="title" value="<?php echo $value['title']; ?>" ></td>
        </tr>
        
        <tr>
            <td>Content</td>
            <td>
                <textarea name="content">
                     <?php echo $value['content']; ?>
                </textarea>
            </td>
            
        </tr>
        
        <tr>
            <td>Category</td>
            <td>
                <select name="cat" class="cat">
                    <option>--Select Option--</option>
        <?php
            foreach ($catlist as $key => $cat) {
        ?>
            <!-- ---------- Very Important Concept for selected option ---------     -->
                    <option 
                        <?php if ($value['cat']== $cat['categoryId']) { ?>
                             selected = "selected" ;
                        <?php } ?> 
                        value="<?php echo $cat['categoryId'];?>"><?php echo $cat['categoryName']; ?>
                    </option>
            <!-- --------------------------------------------------------         -->
        <?php } ?>
                
                </select>
            </td>
        </tr>
        
        <tr>
            <td></td>
            <td><input type="submit" name="submit" value="Update"></td>
        </tr>
    </table>
</form>

<?php } ?>