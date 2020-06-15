<div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="<?php echo base_url(); ?>home/export" class="btn btn-default "><i class="fa fa-file-archive-o"></i> Export Contacts</a>
                </div>

            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
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
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Import contacts
                        </div>
                        <div class="panel-body">
                            <form method="post" action="<?php echo base_url().'home/import_contacts' ?>" enctype="multipart/form-data">
                                <div class="text-center">
                                    <h3>Upload your .csv file</h3>
                                    <p>currently available .csv format</p>
                                    <p><input type="file" name="csv" required><p>
                                    <p><button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-upload"></i> Upload</button></p>
                                </div>
                            </form>
                        </div>
                    </div>

                    
                </div>
                
            </div>
        </div>