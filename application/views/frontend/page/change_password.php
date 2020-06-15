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
                            <div class="panel-heading">Change password
                            </div>
                            <div class="panel-body">
                                <form method="post" action="<?php echo base_url(); ?>home/update_password">
                                  <div class="form-group">
                                    <label>Current Password</label>
                                    <input type="password" class="form-control"  name="c_password" />
                                    <?php 
                                        $e_c_password = $this->session->userdata('e_c_password');
                                        if ($e_c_password) {
                                            echo '<span class="text-danger">'.$e_c_password.'</span>';
                                            $this->session->unset_userdata('e_c_password');
                                        }
                                    ?>
                                  </div>
                                  <div class="form-group">
                                    <label>New password</label>
                                    <input type="password" class="form-control" name="n_password"/>
                                    <?php 
                                        $e_n_password = $this->session->userdata('e_n_password');
                                        if ($e_n_password) {
                                            echo '<span class="text-danger">'.$e_n_password.'</span>';
                                            $this->session->unset_userdata('e_n_password');
                                        }
                                    ?>
                                  </div>
                                  <div class="form-group">
                                    <label>Confirm password</label>
                                    <input type="password" class="form-control" name="cn_password"/>
                                    <?php 
                                        $e_cn_password = $this->session->userdata('e_cn_password');
                                        if ($e_cn_password) {
                                            echo '<span class="text-danger">'.$e_cn_password.'</span>';
                                            $this->session->unset_userdata('e_cn_password');
                                        }
                                    ?>
                                  </div>
                                  <div class="form-group">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-floppy-o"></i> Update</button>
                                    <span class="pull-right"><a href="<?php echo base_url(); ?>home/profile" class="btn btn-default">Cancel</a></span>
                                    </div>
                                </form>
                            </div>
                        </div>
                                            
                    </div>
                    
                </div>
            </div>