<div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="<?php echo base_url(); ?>home/import" class="btn btn-default "><i class="fa fa-plus"></i> Import Contacts</a>
                </div>

            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Export contacts
                        </div>
                        <div class="panel-body">
                        <div class="text-center">
                            <h3>You have total <?php echo $total_contacts; ?> contacts</h3>
                                <p>currently available .csv format</p>
                                <a class="btn btn-primary btn-lg" href="<?php echo base_url(); ?>home/export_contacts"><i class="fa fa-download"></i> Download</a>
                            </div>
                        </div>
                    </div>

                    
                </div>
                
            </div>
        </div>