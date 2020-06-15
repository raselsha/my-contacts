    <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <a href="<?php echo base_url(); ?>home/profile" class="btn btn-default"><i class="fa fa-eye"></i> View profile </a>
                    </div>

                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        
                        <?php 
                            $message = $this->session->userdata('message');
                            $exception = $this->session->userdata('exception');
                            if ($message) {
                                echo '<p class="alert alert-success">'.$message.'</p>';
                                $this->session->unset_userdata('message');
                            }
                            if ($exception) {
                                echo '<p class="alert alert-danger">'.$exception.'</p>';
                                $this->session->unset_userdata('exception');
                             }

                        ?>

                       <div class="panel panel-default">
                            <div class="panel-heading">Edit profile
                            </div>
                            <div class="panel-body">
                                <form method="post" action="<?php echo base_url(); ?>home/update_profile" enctype="multipart/form-data">
                                  <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control"  name="name" value="<?php echo $profile->name; ?>" />
                                    <?php 
                                        $ename = $this->session->userdata('ename');
                                        if ($ename) {
                                            echo '<span class="text-danger">'.$ename.'</span>';
                                            $this->session->unset_userdata('ename');
                                        }
                                    ?>
                                  </div>
                                  <div class="form-group">
                                    <label>Mobile</label>
                                    <input type="text" class="form-control" name="mobile" value="<?php echo $profile->mobile; ?>" />
                                    <?php 
                                        $emobile = $this->session->userdata('emobile');
                                        if ($emobile) {
                                            echo '<span class="text-danger">'.$emobile.'</span>';
                                            $this->session->unset_userdata('emobile');
                                        }
                                    ?>
                                  </div>
                                  <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="email" value="<?php echo $profile->email; ?>" />
                                    <?php 
                                        $eemail = $this->session->userdata('eemail');
                                        if ($eemail) {
                                            echo '<span class="text-danger">'.$eemail.'</span>';
                                            $this->session->unset_userdata('eemail');
                                        }
                                    ?>
                                  </div>

                                  <div class="form-group">
                                    <label>Photo</label>
                                    <input type="file"  name="photo" value="" />
                                    <input type="hidden"  name="pro_pic" value="<?php echo $profile->photo; ?>" />
                                  </div>
                                  <hr>
                                  <div class="form-group">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-floppy-o"></i> Update</button>
                                    <span class="pull-right"><a href="<?php echo base_url(); ?>home/profile" class="btn btn-default"><i class="fa fa-undo"></i> Back</a></span>
                                    </div>
                                </form>
                            </div>
                        </div>
                                            
                    </div>
                    
                </div>
            </div>