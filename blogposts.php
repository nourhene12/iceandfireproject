<?php 
include("../corp/blog.php");

$posts = getAllPosts();


if(!empty($_POST['approve-submit']))
 {publish($_POST['pid']);
   echo '<meta http-equiv="refresh" content="0">';
  }
    if(!empty($_POST['disapprove-submit']))
    {
        unpublish($_POST['pid']);
        echo '<meta http-equiv="refresh" content="0">';
    } 
?>
<div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Posts Table</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th>Id</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Views</th>
                                            <th>Published</th>
                                            <th>Created</th>
                                            <th>Updated</th>
                                            <th>Modify</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($posts as $key ) {
                                        ?>
                                        <tr>
                                            <td><?php $username=getPostAuthorById($key['user_id']);echo ($username->fetch())['username'];?></td>
                                            <td><?php echo $key['id'] ;?></td>
                                            <td><?php echo $key['title'] ;?></td>
                                            <td><?php echo $key['description']; ?></td>
                                            <td><?php echo $key['views'] ;?></td>
                                            <td><form method="POST">
                                                  <?php
                                                  if ( $key['published'] == "0")
                                                  {
                                                    echo '
                                                  <input id="approve-submit" type="submit" name="approve-submit" class="btn btn-success" value= "Publish">';
                                                  }else {
                                                    echo '
                                                  <input id="disapprove-submit" type="submit"  name="disapprove-submit" class="btn btn-warning" value= "Published">';
                                                  }?>
                                                  <input type="hidden"  name="pid" value= "<?php echo $key['id'] ;?>">
                                              </form>
                                                </td>
                                            <td><?php echo $key['created_at']; ?></td>
                                            <td><?php echo $key['updated_at'] ;?></td>

                                            <td> <a role="button" href="<?php echo "blogpostmodify.php?id=".$key['id'];?>" class="btn btn-info">Modify</a></td>

                                             <td> <a role="button" href="<?php echo "postmodify.php?id=".$key['id']."&true=1";?>" class="btn btn-warning">Delete</a></td>
        
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div>
