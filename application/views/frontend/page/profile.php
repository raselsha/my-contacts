<div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="<?php echo base_url(); ?>home/edit_profile" class="btn btn-default"><i class="fa fa-pencil-square-o" aria-hidden="false" 
                    ></i> Edit Profile</a>
                </div>

            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            My profile
                        </div>
                        <div class="panel-body">
                            
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="col-md-2">
                                                <?php 
                                                    if ($profile->photo) {
                                                        echo '<img src="'.base_url().'theme/frontend/images/'.$profile->id.'_'.$profile->photo.'" width="150" alt="Image not found">';
                                                    }
                                                    else{
                                                        echo '<img src="'.base_url().'theme/frontend/images/default.jpg" width="150">';
                                                    }
                                                ?>
                                            </td>
                                            <td colspan="2">
                                                <p>Name:
                                                    <strong><?php echo $profile->name; ?></strong>  
                                                </p>
                                                <p>Mobile:
                                    
                                                    <strong><?php echo $profile->mobile; ?></strong>
                                                </p>
                                                <p>Email:
                                                    <strong><?php echo $profile->email; ?></strong>
                                                    
                                                </p>
                                            </td>
                                        </tr>    
                                    </tbody>
                                </table>
                            </div>
                            <p class="pull-left">
                                <a href="<?php echo base_url(); ?>home/change_password" class="btn btn-default"><i class="fa fa-edit"></i> Change password</a>
                            </p>
                            <p class="pull-right">
                                <a href="<?php echo base_url(); ?>home" class="btn btn-default "><i class="fa fa-undo"></i> Back</a>
                            </p>
                        </div><!--End panel -->
                    </div>
                </div>   
            </div>
        </div>