<div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="<?php echo base_url(); ?>home/new_contact" class="btn btn-default "><i class="fa fa-plus"></i> Add new</a>
                </div>

            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All contacts
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Mobile</th>
                                            <th>Description</th>
                                            <th class="col-md-3"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $sl=1;
                                            foreach ($contacts as $contact) {

                                                echo "<tr>";
                                                echo '<td>'.$sl++.'</td>';
                                                echo '<td>'.$contact->name.'</td>';
                                                echo '<td>'.$contact->mobile.'</td>';
                                                $lenth = strlen($contact->description);
                                                if ($lenth>40) {
                                                    echo '<td>'.substr($contact->description, 0,40).'..</td>';
                                                }
                                                else{
                                                    echo '<td>'.$contact->description.'</td>';
                                                }
                                                echo '<td>
                                                        <a href="'.base_url().'home/edit_contact/'.$contact->id.'" class="btn btn-default btn-xs"><i class=" fa fa-edit "></i> Edit</a>
                                                        <a href="'.base_url().'home/single_contact/'.$contact->id.'" class="btn btn-warning btn-xs"><i class=" fa fa-eye "></i> View</a>
                                                        <a href="'.base_url().'home/delete_contact/'.$contact->id.'" class="btn btn-danger btn-xs"><i class=" fa fa-trash "></i> Delete</a>
                                                      </td>';
                                                echo "</tr>";
                                            }

                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    
                </div>
                
            </div>
        </div>