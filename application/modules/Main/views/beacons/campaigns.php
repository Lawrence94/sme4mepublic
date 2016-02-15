<ul class="breadcrumb">
<li>
  <p>YOU ARE HERE</p>
</li>
<li><a href="#" class="active">Manage Campaigns</a> </li>
</ul>
<div class="page-title">
<h3>Manage <span class="semi-bold">Campaigns</span></h3>
</div>

<!-- BEGIN PLUGIN CSS -->
<link href="<?php echo site_url();?>assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />
<link href="<?php echo site_url();?>assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="<?php echo site_url();?>assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="<?php echo site_url();?>assets/plugins/jquery-datatable/css/jquery.dataTables.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo site_url();?>assets/plugins/datatables-responsive/css/datatables.responsive.css" rel="stylesheet" type="text/css" media="screen"/>
<!-- END PLUGIN CSS -->
<!-- BEGIN CORE CSS FRAMEWORK -->
<style>
.datepicker{z-index:1151 !important;}
</style>
<link href="<?php echo site_url();?>assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo site_url();?>assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo site_url();?>assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo site_url();?>assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo site_url();?>assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css"/>
<!-- END CORE CSS FRAMEWORK -->

<!-- BEGIN CSS TEMPLATE -->
<link href="<?php echo site_url();?>assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo site_url();?>assets/css/responsive.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo site_url();?>assets/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>
<!-- END CSS TEMPLATE -->
<?php //$country['default'] = 'Country...'; ?>
<?php //echo form_dropdown('country', $country, 'default', 'id="remote" style="width:100%"'); ?>

      <?php echo show_notification(); ?>
              <span style="<?= $displayData ?>" >
              <?php echo show_valnotif(); ?>
              </span>

<div class="row-fluid">
        <div class="span12">
          <div class="grid simple ">
            <div class="grid-title">
              <h4>Campaign <span class="semi-bold">Management</span></h4>

              <?php if($isOutletAssigned){ ?>
                <div class="tools">
                  <a href="<?= site_url('company/Campaigns/create') ?>">
                    <button type="button" class="btn btn-primary btn-small">
                      Create Campaign 
                      <i class="fa fa-plus"></i>
                    </button> 
                  </a>
                </div>
              <?php } ?>
            </div>
            
            <div class="grid-body ">
            <?php 
              if (!empty($campQuery) && $isOutletAssigned) {
                
                ?>
              <table class="table table-striped dataTable" id="example3" aria-describedby="example3_info" >
                <thead class="center">
                  <tr>
                    <th>Date Created</th>
                    <th>Campaign Title</th>
                    <th>Start Date</th>
                    <th>Expiry Date</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($campQuery as $val) { ?>
                  <tr class="odd gradeX">
                    <td><?= date_format($val['dateCreated'], 'd-M-Y'); ?></td>
                    <td><?= $val['offerTitle'] ?></td>
                    <td><?= date_format($val['startDate'], 'd-M-Y'); ?></td>
                    <td><?= date_format($val['expiryDate'], 'd-M-Y'); ?></td>
                    <td>
                      <div class="btn-group"> <a class="btn btn-info dropdown-toggle btn-demo-space btn-small" data-toggle="dropdown" href="#">
                       Actions <span class="caret"></span> </a>
                        <ul class="dropdown-menu">
                          <li class="campaign_details">
                            <a href="<?= site_url('company/Campaigns/editCampaign/'. $val['offerId']) ?>">View Details</a>
                          </li>
                        </ul>
                      </div>
                    </td>
                  </tr>
                  <?php } ?>
                  </tbody>
                  </table>
                  <?php
                    }else{
                  ?>
                <?php if($isOutletAssigned){ ?><table class="table table-striped" id="" aria-describedby="" >
                  <div class="text-center"><b>You have not added any campaigns. Please click the "Create Campaign" button above to begin.</b></div>
                </table><?php }?>
                <?php if(!$isOutletAssigned){ ?><table class="table table-striped" id="" aria-describedby="" >
                  <div class="text-center"><b>You have not been assigned to any venue. Please contact your administrator</b></div>
                </table><?php } ?>
                  <?php 
                    }
                  ?>
            </div>

            <!-- Modal -->
                  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                          <br>
                          <i class="fa fa-bar-chart-o fa-7x"></i>
                          <h4 id="myModalLabel" class="semi-bold">Create Campaign</h4>
                          <p class="no-margin">Please fill in the details of the Campaign </p>
                          <br>
                        </div>
                        <div class="modal-body">
                        <form id="admin_form" name="adminform" class="animated" action="<?= site_url('company/Campaigns') ?>" method="post">
                        Campaign Information :<br>
                          <div class="row form-row">
                            <div class="col-md-6">
                              <input required type="text" class="form-control" name="createcamp[title]" id="beacname" placeholder="Offer Title">
                            </div>
                            <div class="col-md-6">
                            <input required type="text" name="createcamp[type]" class="form-control" placeholder="Offer type">
                            </div>
                          </div>
                          <div class="row form-row">
                            <div class="col-md-5">
                              <select required id="selector" name="createcamp[section]" style="width:100%" data-url="<?php echo site_url('company/campaigns/get_beacons'); ?>">
                                  <option value="">Section...</option>
                                <?php foreach ($sectionQuery as $sectionId => $sectionName) {
                                 ?>
                                  <option value="<?= $sectionId ?>"><?= $sectionName ?></option>
                                <?php } ?>
                              </select>
                            </div>
                             <div class="col-md-5">
                              <h5 id="selectorwords"></h5>
                            </div>
                          </div>
                          <div class="row form-row">
                             <div class="col-md-12">
                               <input required type="text" name="createcamp[desc]" class="form-control" placeholder="Offer Description">
                              </div>  
                           </div>
                          <div class="row form-row">
                            <div class="col-md-5">
                               <input required type="text" name="createcamp[points]" class="form-control" placeholder="Allocation (Points)">
                            </div>
                            <div class="col-md-2">
                                <select required id="selectsomething" name="createcamp[status]" style="width:100%">
                                  <option value="draft">Draft</option>
                                  <option value="live">Live</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                              <div class="input-append success date">
                                  <input type="text" name="createcamp[expirydate]" class="form-control" id="sandbox-advance" placeholder="Expiry Date">
                                  <a href="#sandbox-advance"><span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span></a>
                              </div>
                            </div>
                          </div>
                          <div class="row form-row">
                            <div class="col-md-12">
                              <h5><b>Note:</b> If you select "Live", your campaign will be posted immediately</h5>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" id="closure" class="btn btn-default" data-dismiss="modal">Close</button>
                          <input name="" type="submit" class="btn btn-primary" value="Create">
                        </div>
                        </form>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->

                  <!-- Modal -->
                  <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                          <br>
                          <i class="fa fa-bar-chart-o fa-7x"></i>
                          <h4 id="myModalLabel" class="semi-bold">Campaign Details</h4>
                          <p class="no-margin">Please fill in the details of the Campaign </p>
                          <br>
                        </div>
                        <div class="modal-body">
                        <form id="editcamp_form" name="adminform" class="animated editcamp_form" method="post">
                        <h4>Campaign Details :</h4> <br>
                          <div class="row form-row">
                            <div class="col-md-5">
                              <h5 id="title_offer"><b>Title</b></h5> 
                            </div>
                            
                          </div>
                          <div class="row form-row">
                            <div class="col-md-3">
                              <h5>Offer Title:-</h5> 
                            </div>
                            <div class="col-md-8">
                            <input required type="text" id="title_offers" name="editcamp[title]" class="form-control" >
                            <input type="hidden" id="id_offers" name="editcamp[id]">
                            </div>
                          </div>
                          <div class="row form-row">
                            <div class="col-md-3">
                              <h5>Offer Type:-</h5>
                            </div>
                             <div class="col-md-8">
                              <input required type="text" id="type_offers" name="editcamp[type]" class="form-control">
                            </div>
                          </div>
                          <div class="row form-row">
                             <div class="col-md-3">
                               <h5>Allocation:-</h5>
                             </div>
                             <div class="col-md-8">
                             <input required type="text" id="points_offers" name="editcamp[points]" class="form-control">
                             </div>  
                           </div>
                           <div class="row form-row">
                            <div class="col-md-7">
                            <a id="delCamp" class="campDel" href=""><button type="button" class="btn btn-danger">Delete Campaign <i class="fa fa-eraser"></i></button></a>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" id="closure" class="btn btn-default" data-dismiss="modal">Close</button>
                          <input name="" type="submit" class="btn btn-primary" value="Save">
                        </div>
                        </form>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->
          </div>
        </div>
      </div>



