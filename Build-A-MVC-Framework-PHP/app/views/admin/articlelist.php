<!-- in (Video) postlist = article list -->
<h2>Article List</h2>

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
        <th width="5%">No</th>
        <th width="20%">Title</th>
        <th width="40%">Content</th>
        <th width="15%">Category</th>
        <th width="20%">Action</th>
    </tr>
<?php
$i=0;
foreach ($listPost as $key => $value) {
    $i++;
?>    
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $value['title']; ?></td>
        <td>
             <?php 
				$text = $value['content']; 
				if (strlen($text)>100) 
				{
					$text = substr($text,0,100);
					echo $text;
				}
			?> 
        </td>
        <td>
            <?php
                foreach ($catlist as $key => $category) {
                    if ($category['categoryId']== $value['cat']) {
                        echo $category['categoryName'];
                    }
                }
            ?>
        </td>
<!-- ================ Condition for 1 ==============  -->
<?php
    if (Session::get('level')==1) {
?> 
        <td>       
            <a href="<?php echo BASE_URL;?>/Admin/editArticle/<?php echo $value['postId']; ?>">Edit</a>
            <a href="<?php echo BASE_URL;?>/Admin/deleteArticle/<?php echo $value['postId']; ?>"  onclick="return confirm('Are you sure to Delete !');">Delete</a>
        </td>
<?php }else { ?>
        <td style="color:red">Not Permitted</td>
<?php  } ?>    
    </tr>

<?php } ?>    

</table>