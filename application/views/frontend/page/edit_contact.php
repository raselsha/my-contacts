    <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <a href="<?php echo base_url(); ?>home" class="btn btn-default"><i class="fa fa-book"></i> Vew all </a>
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
                            <div class="panel-heading">Add new contacts
                            </div>
                            <div class="panel-body">
                                <form method="post" action="<?php echo base_url().'home/update_contact/'.$single_contat->id; ?>">
                                  <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control"  name="name" value="<?php echo $single_contat->name; ?>" />
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
                                    <input type="text" class="form-control" name="mobile" value="<?php echo $single_contat->mobile; ?>" />
                                    <?php 
                                        $emobile = $this->session->userdata('emobile');
                                        if ($emobile) {
                                            echo '<span class="text-danger">'.$emobile.'</span>';
                                            $this->session->unset_userdata('emobile');
                                        }
                                    ?>
                                  </div>
                                  <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" rows="3" name="description"><?php echo $single_contat->description; ?></textarea>
                                  </div>
                                  <div class="form-group">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-floppy-o"></i> Update</button>
                                    <span class="pull-right"><a href="<?php echo base_url(); ?>home" class="btn btn-default"><i class="fa fa-undo"></i> Back</a></span>
                                    </div>
                                </form>
                            </div>
                        </div>
                                            
                    </div>
                    
                </div>
            </div>