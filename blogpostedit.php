<?php 
include("$_SERVER[DOCUMENT_ROOT]/Front/core/blog.php");

$result=getpost("82");

 ?>
<div class="card-body card-block">
                                <form action="./views/postmodify.php" method="post" enctype="multipart/form-data" class="form-horizontal" id="postform">
                                    <div class="row form-group">
                                        <label class=" form-control-label" focus="true"><bold><h3>Blog post editing form</h3></bold></label>
                                        
                                    </div>
                                    <input type="text" hidden="true" value="<?php echo $_GET['id'];?>" name="idp" id="idp">
                                    <br>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Title Input</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="text-input" placeholder="Title" class="form-control" value=" " required="<?php echo"true";?>"><small class="form-text text-muted">Title</small></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="description-input" class=" form-control-label">Description Input</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="description-input" name="description-input" placeholder="Enter post description" class="form-control" required="<?php echo"true";?>"><small class="help-block form-text">Please modify your post description</small></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Post body</label></div>
                                        <div class="col-12 col-md-9"><textarea name="textarea-input" id="textarea-input" rows="9" placeholder="Content..." class="form-control" required="<?php echo"true";?>"></textarea></div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer">
                                <button type="submit" form="postform" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Submit
                                </button>
                                <button type="reset" form="postform" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Reset
                                </button>
                            </div>

                          <?php ?>