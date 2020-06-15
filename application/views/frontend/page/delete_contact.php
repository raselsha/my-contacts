<div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="<?php echo base_url(); ?>home/new_contact" class="btn btn-default"><i class="fa fa-plus"></i> Add new</a>
                </div>

            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            Delete contact
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-responsive">
                                    <tbody>
                                        <?php                                                                        
                                        echo '<tr class="danger"><td class="col-md-1">Name:</td><td>'.$single_contact->name.'</td></tr>';                                     
                                        echo '<tr class="danger"><td class="col-md-1">Mobile:</td><td>'.$single_contact->mobile.'</td></tr>';                                                                          
                                        echo '<tr class="danger"><td class="col-md-1">Description:</td><td><p>'.$single_contact->description.'</p></td></tr>';   
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            
                            <p class="pull-right"><a href="<?php echo base_url().'home'; ?>" class="btn btn-default btn-sm"><i class=" fa fa-undo "></i> Back</a></p>

                            <p class="pull-left"><a href="<?php echo base_url().'home/delete_confirm/'.$single_contact->id; ?>" class="btn btn-danger btn-sm"><i class=" fa fa-check fa-lg"></i> Confirm</a></p>
                        </div>
                    </div>

                    
                </div>
                
            </div>
        </div>