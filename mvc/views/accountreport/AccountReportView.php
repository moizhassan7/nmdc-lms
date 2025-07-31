<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa iniicon-accountreport"></i> <?=$this->lang->line('panel_title')?></h3>
        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li><a href="<?=base_url("accounts/index")?>">Accounts</a></li>
            <li class="active"> <?=$this->lang->line('panel_title')?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
            <div class="form-group col-sm-3" id="schoolyearIDDiv">                
                    <label>Account Name</label>
                                <?php
                                    $array = array();
                                    foreach ($accounts as $parent) {
                                        $account_name = '';
                                        if($parent->account_name) {
                          $parentsemail = " (" . $parent->account_name ." )";
                                        }
                          $array[$parent->accountsID] = $parent->account_name;
                                    }
                                    echo form_dropdown("accountsID", $array, set_value("accountsID"), "id='accountsID' class='form-control accountsID select2'");
                                ?>
                </div>
                
                <div class="form-group col-sm-3" id="schoolyearIDDiv">                
                    <label><?=$this->lang->line("accountreport_academicyear")?></label>
                    <?php
                        $array = [];
                        $array['0'] = $this->lang->line("accountreport_all_accademic_year");
                        if(customCompute($schoolyears)) {
                            foreach ($schoolyears as $schoolyear) {
                                $array[$schoolyear->schoolyearID] = $schoolyear->schoolyear;
                            }
                        }
                        echo form_dropdown("schoolyearID", $array , set_value("schoolyearID"), "id='schoolyearID' class='form-control select2'");
                     ?>
                </div>
                <div class="form-group col-sm-3" id="fromdateDiv">
                    <label><?=$this->lang->line("accountreport_fromdate")?></label>
                    <input type="text" name="fromdate" class="form-control fromdate" id="fromdate">
                </div>
                <div class="form-group col-sm-3" id="todateDiv">
                    <label><?=$this->lang->line("accountreport_todate")?></label>
                    <input type="text" name="todate" class="form-control todate" id="todate">
                </div>
                <div class="col-sm-3">
                    <button id="get_accountreport" class="btn btn-success"> <?=$this->lang->line("accountreport_submit")?></button>
                </div>
            </div>
        </div><!-- row -->
    </div><!-- Body -->
</div><!-- /.box -->

<div id="load_accountreport"></div>


<script type="text/javascript">
    function printDiv(divID) {
        var oldPage = document.body.innerHTML;
        $('#headerImage').remove();
        $('.footerAll').remove();
        var divElements = document.getElementById(divID).innerHTML;
        var footer = "<center><img src='<?=base_url('uploads/images/'.$siteinfos->photo)?>' style='width:30px;' /></center>";
        var copyright = "<center><?=$siteinfos->footer?> | <?=$this->lang->line('accountreport_hotline')?> : <?=$siteinfos->phone?></center>";
        document.body.innerHTML =
          "<html><head><title></title></head><body>" +
          "<center><img src='<?=base_url('uploads/images/'.$siteinfos->photo)?>' style='width:50px;' /></center>"
          + divElements + footer + copyright + "</body>";

        window.print();
        document.body.innerHTML = oldPage;
        window.location.reload();
    }

    $('.select2').select2();

    $('#fromdate').datepicker({
        autoclose: true,
        format: 'dd-mm-yyyy',
    });

    $('#todate').datepicker({
        autoclose: true,
        format: 'dd-mm-yyyy',
    });
    
    $(document).on('change',"#accountsID", function(event) {
        event.preventDefault();
        $('#load_accountreport').html('');
		$("#fromdate").val('');
        $('#todate').val('');
    });
	
	$(document).on('change',"#schoolyearID", function(event) {
        event.preventDefault();
        $('#load_accountreport').html('');
        $("#fromdate").val('');
        $('#todate').val('');
    });

    $(document).on('change',"#fromdate", function() {
        $('#load_accountreport').html('');
    });

    $(document).on('change',"#todate", function() {
        $('#load_accountreport').html('');
    });


    $(document).on('click','#get_accountreport', function() {
        $('#load_accountreport').html('');
        var passData;
        var error = 0;
        var field = {
            'accountsID': $("#accountsID").val(),
			'schoolyearID': $("#schoolyearID").val(),
            'fromdate'    : $("#fromdate").val(),
            'todate'      : $('#todate').val(), 
        };

        if(error == 0) {
            makingPostDataPreviousofAjaxCall(field);
        }
    });

    function makingPostDataPreviousofAjaxCall(field) {
        passData = field;
        ajaxCall(passData);
    }

    function ajaxCall(passData) {
        $.ajax({
            type: 'POST',
            url: "<?=base_url('accountreport/getaccountreport')?>",
            data: passData,
            dataType: "html",
            success: function(data) {
                var response = JSON.parse(data);
                renderLoder(response, passData);
            }
        });
    }

    function renderLoder(response, passData) {
        if(response.status) {
            $('#load_accountreport').html(response.render);
            for (var key in passData) {
                if (passData.hasOwnProperty(key)) {
                    $('#'+key).parent().removeClass('has-error');
                }
            }
        } else {
            for (var key in passData) {
                if (passData.hasOwnProperty(key)) {
                    $('#'+key).parent().removeClass('has-error');
                }
            }

            for (var key in response) {
                if (response.hasOwnProperty(key)) {
                    $('#'+key).parent().addClass('has-error');
                }
            }
        }
    }
</script>


