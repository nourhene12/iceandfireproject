<div class="card-body card-block">
                                <form action="postadd.php" method="post" enctype="multipart/form-data" class="form-horizontal" id="postform" name="postform">
                                    <div class="row form-group">
                                        <label class=" form-control-label" focus="true"><bold><h3>Blog post publishing form</h3></bold></label>
                                        
                                    </div>
                                    <br>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Title Input</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="title" name="title" placeholder="Title" class="form-control" ></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="description-input" class=" form-control-label">Description Input</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="description" name="description" placeholder="Enter post description" class="form-control" ></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Post body</label></div>
                                        <div class="col-12 col-md-9"><textarea name="body" id="body" rows="9" placeholder="Content..." class="form-control" ></textarea></div>
                                    </div>
                                    
                                    
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label class=" form-control-label">Do you want to publish this ?</label></div>
                                        <div class="col col-md-9">
                                            <div class="form-check-inline form-check">
                                                <label for="inline-checkbox1" class="form-check-label ">
                                                    <input type="checkbox" id="publish" name="publish" value="1" class="form-check-input" >Publish : 
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="preview-input" class=" form-control-label">Preview image</label></div>
                                        <div class="col-12 col-md-9"><input type="file" id="preview-input" name="preview-input" class="form-control-file" ></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="header-input" class=" form-control-label">Post header image</label></div>
                                        <div class="col-12 col-md-9"><input type="file" id="header-input" name="header-input" class="form-control-file"></div>
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


      <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js'></script>   

                            <script type="text/javascript" src="./assets/js/validator.js"></script>