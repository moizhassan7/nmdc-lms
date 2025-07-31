<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-student"></i> <?=$this->lang->line('panel_title')?></h3>

        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li><a href="<?=base_url("student/index")?>"><?=$this->lang->line('menu_student')?></a></li>
            <li class="active"><?=$this->lang->line('menu_add')?> <?=$this->lang->line('menu_student')?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12" style="padding:0;">
                <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">

<div class="col-sm-12" style="padding:0;">
                    <?php
                        if(form_error('roll'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="roll" class="control-label">
                            <?=$this->lang->line("student_roll")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                            <input type="text" class="form-control" id="roll" name="roll" value="<?=set_value('roll')?>" >
                        </div>
                        <span class="control-label">
                            <?php echo form_error('roll'); ?>
                        </span>
                    </div>
                    
					<?php
                        if(form_error('name'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="name_id" class="control-label">
                            <?=$this->lang->line("student_name")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
<input type="text" class="form-control" id="name_id" name="name" value="<?=set_value('name')?>" >
                        </div>
                        <span class="control-label">
                            <?php echo form_error('name'); ?>
                        </span>
                    </div>


                    <?php
                        if(form_error('guargianID'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="guargianID" class="control-label">
                            <?=$this->lang->line("student_guargian")?> <span class="text-red">*</span>
                        </label>
                            <div class="">
                                <?php
                                    $array = array('0' => $this->lang->line('student_select_guargian'));
                                    foreach ($parents as $parent) {
                                        $parentsemail = '';
                                        if($parent->email) {
                                            $parentsemail = " (" . $parent->email ." )";
                                        }
                                        $array[$parent->parentsID] = $parent->name.$parentsemail;
                                    }
                                    echo form_dropdown("guargianID", $array, set_value("guargianID"), "id='guargianID' class='form-control guargianID select2'");
                                ?>
                            </div>
                        <span class="control-label">
                            <?php echo form_error('guargianID'); ?>
                        </span>
                    </div>

</div>
<div class="col-sm-12" style="padding:0;"> 

                    <?php
                        if(form_error('sex'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="sex" class="control-label">
                            <?=$this->lang->line("student_sex")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                            <?php
                                echo form_dropdown("sex", array($this->lang->line('student_sex_male') => $this->lang->line('student_sex_male'), $this->lang->line('student_sex_female') => $this->lang->line('student_sex_female')), set_value("sex"), "id='sex' class='form-control'");
                            ?>
                        </div>
                        <span class="control-label">
                            <?php echo form_error('sex'); ?>
                        </span>
                    </div>

                   
                    <?php
                        if(form_error('marstatus'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="marstatus" class="control-label">
                            <?=$this->lang->line("student_marstatus")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                            <?php
                                $marstatusArray = array(
                                    'Single' => 'Single',
                                    'Married' => 'Married',
                                    'Widowed' => 'Widowed',
                                    'Divorced' => 'Divorced',
                                    'Seperated' => 'Seperated'
                                );
                                echo form_dropdown("marstatus", $marstatusArray, set_value("marstatus"), "id='marstatus' class='form-control select2'");
                            ?>
                        </div>
                        <span class="control-label">
                            <?php echo form_error('marstatus'); ?>
                        </span>
                    </div>
                    
                        <?php
                        if(form_error('dob'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="dob" class="control-label">
                            <?=$this->lang->line("student_dob")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                            <input type="text" class="form-control" id="dob" name="dob" value="<?=set_value('dob')?>" >
                        </div>
                        <span class="control-label">
                            <?php echo form_error('dob'); ?>
                        </span>
                    </div>


</div>

<div class="col-sm-12" style="padding:0;">
                    <?php
                        if(form_error('placeofbirth'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="placeofbirth" class="control-label">
                         <?=$this->lang->line("student_placeofbirth")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                            <input type="text" class="form-control" id="placeofbirth" name="placeofbirth" value="<?=set_value('placeofbirth')?>" >
                        </div>
                        <span class="control-label">
                            <?php echo form_error('placeofbirth'); ?>
                        </span>
                    </div>
                    
                    <?php
                        if(form_error('nationality'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="nationality" class="control-label">
                         <?=$this->lang->line("student_nationality")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                            <input type="text" class="form-control" id="nationality" name="nationality" value="<?=set_value('nationality')?>" >
                        </div>
                        <span class="control-label">
                            <?php echo form_error('nationality'); ?>
                        </span>
                    </div>
                    
                    <?php
                        if(form_error('passportno'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="passportno" class="control-label">
                         <?=$this->lang->line("student_passportno")?>
                        </label>
                        <div class="">
                            <input type="text" class="form-control" id="passportno" name="passportno" value="<?=set_value('passportno')?>" >
                        </div>
                        <span class="control-label">
                            <?php echo form_error('passportno'); ?>
                        </span>
                    </div>


</div>

<div class="col-sm-12" style="padding:0;">                    
                    <?php
                        if(form_error('phone'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="phone" class="control-label">
                         <?=$this->lang->line("student_cellno")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                            <input type="text" class="form-control" id="phone" name="phone" value="<?=set_value('phone')?>" data-inputmask="'mask': '0399-99999999'" type="text" maxlength= "12">
                        </div>
                        <span class="control-label">
                            <?php echo form_error('phone'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('cnicno'))
echo "<div class='form-group col-sm-8 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-8' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="cnicno" class="control-label">
                         <?=$this->lang->line("student_cnicno")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                            <input type="text" class="form-control" id="cnicno" name="cnicno" value="<?=set_value('cnicno')?>" data-inputmask="'mask': '99999-9999999-9'"  placeholder="XXXXX-XXXXXXX-X">
                        </div>
                        <span class="control-label">
                            <?php echo form_error('cnicno'); ?>
                        </span>
                    </div>

</div>

<div class="col-sm-12" style="padding:0;">
                    <?php
                        if(form_error('classesID'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="classesID" class="control-label">
                            <?=$this->lang->line("student_classes")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                            <?php
                                $classArray = array(0 => $this->lang->line("student_select_class"));
                                foreach ($classes as $classa) {
                                    $classArray[$classa->classesID] = $classa->classes;
                                }
                                echo form_dropdown("classesID", $classArray, set_value("classesID"), "id='classesID' class='form-control select2'");
                            ?>
                        </div>
                        <span class="control-label">
                            <?php echo form_error('classesID'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('sectionID'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="sectionID" class="control-label">
                            <?=$this->lang->line("student_section")?> <span class="text-red">*</span>
                        </label>

                        <div class="">
                            <?php
                                $sectionArray = array(0 => $this->lang->line("student_select_section"));
                                if($sections != "empty") {
                                    foreach ($sections as $section) {
                                        $sectionArray[$section->sectionID] = $section->section;
                                    }
                                }

                                $sID = 0;
                                if($sectionID == 0) {
                                    $sID = 0;
                                } else {
                                    $sID = $sectionID;
                                }

                                echo form_dropdown("sectionID", $sectionArray, set_value("sectionID", $sID), "id='sectionID' class='form-control select2'");
                            ?>
                        </div>
                        <span class="control-label">
                            <?php echo form_error('sectionID'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('optionalSubjectID'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="optionalSubjectID" class="control-label">
               			<?=$this->lang->line("student_optionalsubject")?>
                        </label>

                        <div class="">
                            <?php
                            $optionalSubjectArray = array(0 => $this->lang->line("student_select_optionalsubject"));
                            if($optionalSubjects != "empty") {
                                foreach ($optionalSubjects as $optionalSubject) {
                                    $optionalSubjectArray[$optionalSubject->subjectID] = $optionalSubject->subject;
                                }
                            }

                            echo form_dropdown("optionalSubjectID", $optionalSubjectArray, set_value("optionalSubjectID", $optionalSubjectID), "id='optionalSubjectID' class='form-control select2'");
                            ?>
                        </div>
                        <span class="control-label">
                            <?php echo form_error('optionalSubjectID'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('studentGroupID'))
echo "<div class='form-group col-sm-3 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-3' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="studentGroupID" class="control-label">
               <?=$this->lang->line("student_studentgroup")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                            <?php
                       $groupArray = array();
                                if(customCompute($studentgroups)) {
                                    foreach ($studentgroups as $studentgroup) {
                                        $groupArray[$studentgroup->studentgroupID] = $studentgroup->group;
                                    }
                                }
                                echo form_dropdown("studentGroupID", $groupArray, set_value("studentGroupID"), "id='studentGroupID' class='form-control select2'");
                            ?>
                        </div>
                        <span class="control-label">
                            <?php echo form_error('studentGroupID'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('student_Student_Status'))
echo "<div class='form-group col-sm-3 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-3' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="student_Student_Status" class="control-label">
        <?=$this->lang->line("student_Student_Status")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                            <?php
                                $Student_StatusArray = array(
                                    'Regular' => 'Regular',
                                    'Detainee' => 'Detainee',
                                    'Dropout' => 'Dropout',
									'Freeze' => 'Freeze',
                                    'Pass Out' => 'Pass Out',
                                    'Struck off' => 'Struck off'
                                );
                                echo form_dropdown("Student_Status", $Student_StatusArray, set_value("Student_Status"), "id='Student_Status' class='form-control select2'");
                            ?>
                        </div>
                        <span class="control-label">
                            <?php echo form_error('student_Student_Status'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('student_current_year'))
echo "<div class='form-group col-sm-2 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-2' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="student_current_year" class="control-label">
        <?=$this->lang->line("student_current_year")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
<select name="current_year" id="current_year" class="form-control">
<option value="0">Select</option>
<?php $cyear=2015; for($a=$cyear; $a<=2099; $a++){?>
<option><?php echo $a ; ?></option>
<?php } ?>
</select>
                        </div>
                        <span class="control-label">
                            <?php echo form_error('student_current_year'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('studentsess_strt'))
echo "<div class='form-group col-sm-2 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-2' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="studentsess_strt" class="control-label">
                            <?=$this->lang->line("student_sess_strt")?>
                        </label>
                        <div class="">
<select name="session_strt" id="session_strt" class="form-control">
<option value="0">Select</option>
<?php $cyear=2010; for($a=$cyear; $a<=2099; $a++){?>
<option><?php echo $a ; ?></option>
<?php } ?>
</select>
                        </div>
                        <span class="control-label">
                            <?php echo form_error('studentsess_strt'); ?>
                        </span>
                    </div>
                    
                    <?php
                        if(form_error('studentsess_end'))
echo "<div class='form-group col-sm-2 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-2' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="studentsess_end" class="control-label">
                            <?=$this->lang->line("student_sess_end")?>
                        </label>
                        <div class="">
<select name="session_end" id="session_end" class="form-control">
<option value="0">Select</option>
<?php $cyear=2010; for($a=$cyear; $a<=2099; $a++){?>
<option><?php echo $a ; ?></option>
<?php } ?>
</select>
                        </div>
                        <span class="control-label">
                            <?php echo form_error('studentsess_end'); ?>
                        </span>
                    </div>

</div>

<div class="col-sm-12" style="padding:0;">
<p class="form_titlez">Current Residential Address</p>                  
                        <?php
                        if(form_error('country'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="country" class="control-label">
                            <?=$this->lang->line("student_country")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                            <?php
                                $country['0'] = $this->lang->line('student_select_country');
                                foreach ($allcountry as $allcountryKey => $allcountryit) {
                                    $country[$allcountryKey] = $allcountryit;
                                }
                            ?>
                            <?php
                                echo form_dropdown("country", $country, set_value("country"), "id='country' class='form-control select2'");
                            ?>
                        </div>
                        <span class="control-label">
                            <?php echo form_error('country'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('state'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="state" class="control-label">
                            <?=$this->lang->line("student_state")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                            <input type="text" class="form-control" id="state" name="state" value="<?=set_value('state')?>" >
                        </div>
                        <span class="control-label">
                            <?php echo form_error('state'); ?>
                        </span>
                    </div>
                    
                    <?php
                        if(form_error('city'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="city" class="control-label">
                            <?=$this->lang->line("student_city")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                            <input type="text" class="form-control" id="city" name="city" value="<?=set_value('city')?>" >
                        </div>
                        <span class="control-label">
                            <?php echo form_error('city'); ?>
                        </span>
                    </div>

</div>

<div class="col-sm-12" style="padding:0;">
                    <?php
                        if(form_error('address'))
echo "<div class='form-group col-sm-9 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-9' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="address" class="control-label">
                            <?=$this->lang->line("student_address")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                            <input type="text" class="form-control" id="address" name="address" value="<?=set_value('address')?>" >
                        </div>
                        <span class="control-label">
                            <?php echo form_error('address'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('pcode'))
echo "<div class='form-group col-sm-3 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-3' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="pcode" class="control-label">
                            <?=$this->lang->line("student_pcode")?>
                        </label>
                        <div class="">
                            <input type="text" class="form-control" id="pcode" name="pcode" value="<?=set_value('pcode')?>" >
                        </div>
                        <span class="control-label">
                            <?php echo form_error('pcode'); ?>
                        </span>
                    </div>
</div>

<div class="col-sm-12" style="padding:0;"> 
<p class="form_titlez">Permanent Residential Address</p>                   
                        <?php
                        if(form_error('pcountry'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="pcountry" class="control-label">
                            <?=$this->lang->line("student_pcountry")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                            <?php
                                $country['0'] = $this->lang->line('student_select_country');
                                foreach ($allcountry as $allcountryKey => $allcountryit) {
                                    $country[$allcountryKey] = $allcountryit;
                                }
                            ?>
                            <?php
                                echo form_dropdown("pcountry", $country, set_value("pcountry"), "id='pcountry' class='form-control select2'");
                            ?>
                        </div>
                        <span class="control-label">
                            <?php echo form_error('pcountry'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('pstate'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="pstate" class="control-label">
                            <?=$this->lang->line("student_pstate")?> <span class="text-red">*</span>
<span style="padding-left:20px;"><input id="chkSame" type="checkbox" style="height:10px; width:10px;">
<label for="chkSame" style="font-size:12px; color:#990000; text-align:right; margin:0;">Same as current address</label></span>
                        </label>
                        <div class="">
                            <input type="text" class="form-control" id="pstate" name="pstate" value="<?=set_value('pstate')?>" >
                        </div>
                        <span class="control-label">
                            <?php echo form_error('pstate'); ?>
                        </span>
                    </div>
                    
                    <?php
                        if(form_error('pcity'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="pcity" class="control-label">
                            <?=$this->lang->line("student_pcity")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                            <input type="text" class="form-control" id="pcity" name="pcity" value="<?=set_value('pcity')?>" >
                        </div>
                        <span class="control-label">
                            <?php echo form_error('pcity'); ?>
                        </span>
                    </div>

</div>

<div class="col-sm-12" style="padding:0;">
                    <?php
                        if(form_error('paddress'))
echo "<div class='form-group col-sm-9 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-9' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="paddress" class="control-label">
                            <?=$this->lang->line("student_paddress")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                            <input type="text" class="form-control" id="paddress" name="paddress" value="<?=set_value('paddress')?>" >
                        </div>
                        <span class="control-label">
                            <?php echo form_error('paddress'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('ppcode'))
echo "<div class='form-group col-sm-3 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-3' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="ppcode" class="control-label">
                            <?=$this->lang->line("student_ppcode")?>
                        </label>
                        <div class="">
                            <input type="text" class="form-control" id="ppcode" name="ppcode" value="<?=set_value('ppcode')?>" >
                        </div>
                        <span class="control-label">
                            <?php echo form_error('ppcode'); ?>
                        </span>
                    </div>
</div>

<div class="col-sm-12" style="padding:0;">
<p class="form_titlez">Contact in Case of Emergency?</p>  
                    <?php
                        if(form_error('emername'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="emername" class="control-label">
                    <?=$this->lang->line("student_emername")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                            <input type="text" class="form-control" id="emername" name="emername" value="<?=set_value('emername')?>" >
                        </div>
                        <span class="control-label">
                            <?php echo form_error('emername'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('emerrel'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="emerrel" class="control-label">
                    <?=$this->lang->line("student_emerrel")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                            <input type="text" class="form-control" id="emerrel" name="emerrel" value="<?=set_value('emerrel')?>" >
                        </div>
                        <span class="control-label">
                            <?php echo form_error('emerrel'); ?>
                        </span>
                    </div>


                    <?php
                        if(form_error('emer_occ'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="emer_occ" class="control-label">
                    <?=$this->lang->line("student_emer_occ")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                            <input type="text" class="form-control" id="emer_occ" name="emer_occ" value="<?=set_value('emer_occ')?>" >
                        </div>
                        <span class="control-label">
                            <?php echo form_error('emer_occ'); ?>
                        </span>
                    </div>
</div>

<div class="col-sm-12" style="padding:0;">
                    <?php
                        if(form_error('emer_phoff'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="emer_phoff" class="control-label">
                    <?=$this->lang->line("student_emer_phoff")?>
                        </label>
                        <div class="">
                            <input type="text" class="form-control" id="emer_phoff" name="emer_phoff" value="<?=set_value('emer_phoff')?>" >
                        </div>
                        <span class="control-label">
                            <?php echo form_error('emer_phoff'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('emer_phres'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="emer_phres" class="control-label">
                    <?=$this->lang->line("student_emer_phres")?>
                        </label>
                        <div class="">
                            <input type="text" class="form-control" id="emer_phres" name="emer_phres" value="<?=set_value('emer_phres')?>" >
                        </div>
                        <span class="control-label">
                            <?php echo form_error('emer_phres'); ?>
                        </span>
                    </div>


                    <?php
                        if(form_error('emer_cell'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="emer_cell" class="control-label">
                    <?=$this->lang->line("student_emer_cell")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                            <input type="text" class="form-control" id="emer_cell" name="emer_cell" value="<?=set_value('emer_cell')?>" data-inputmask="'mask': '0399-99999999'" maxlength= "12">
                        </div>
                        <span class="control-label">
                            <?php echo form_error('emer_cell'); ?>
                        </span>
                    </div>
</div>

<div class="col-sm-12" style="padding:0;">
                    <?php
                        if(form_error('emer_address'))
echo "<div class='form-group col-sm-12 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-12' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="emer_address" class="control-label">
                    <?=$this->lang->line("student_emer_address")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                            <input type="text" class="form-control" id="emer_address" name="emer_address" value="<?=set_value('emer_address')?>">
                        </div>
                        <span class="control-label">
                            <?php echo form_error('emer_address'); ?>
                        </span>
                    </div>
</div>

<div class="col-sm-12" style="padding:15px;">
<p class="form_titlez">Academic Record</p> 
<table class="table table-bordered" style="margin-bottom:5px;">
<tr>
<th class="form_titlezb">Examination</th>
<th class="form_titlezb">Year</th>
<th class="form_titlezb">Mark/Grade</th>
<th class="form_titlezb">Institution Name</th>
</tr>

<tr>
<th>Matriculation</th>
<td>
<select name="matricyear" id="matricyear" class="form-control">
<option value="0">Select</option>
<?php $cyear=date('Y'); for($a=$cyear; $a>=1947; $a--){?>
<option><?php echo $a ; ?></option>
<?php } ?>
</select>
</td>
<td><input type="text" name="matricmarks" class="form-control" id="matricmarks" value="<?=set_value('matricmarks')?>"></td>
<td><input type="text" name="matricinst" class="form-control" id="matricinst" value="<?=set_value('matricinst')?>"></td>
</tr>
<tr>
<th>F.SC</th>
<td>
<select name="fscyear" id="fscyear" class="form-control">
<option value="0">Select</option>
<?php $cyear=date('Y'); for($a=$cyear; $a>=1947; $a--){?>
<option><?php echo $a ; ?></option>
<?php } ?>
</select>
</td>
<td><input type="text" name="fscmarks" class="form-control" id="fscmarks" value="<?=set_value('fscmarks')?>"></td>
<td><input type="text" name="fscinst" class="form-control" id="fscinst" value="<?=set_value('fscinst')?>"></td>
</tr>
<tr>
<th>O-Levels</th>
<td>
<select name="olevelyear" id="olevelyear" class="form-control">
<option value="0">Select</option>
<?php $cyear=date('Y'); for($a=$cyear; $a>=1947; $a--){?>
<option><?php echo $a ; ?></option>
<?php } ?>
</select>
</td>
<td><input type="text" name="olevelmarks" class="form-control" id="olevelmarks" value="<?=set_value('olevelmarks')?>"></td>
<td><input type="text" name="olevelinst" class="form-control" id="olevelinst" value="<?=set_value('olevelinst')?>"></td>
</tr>
<tr>
<th>A-Levels</th>
<td>
<select name="alevelyear" id="alevelyear" class="form-control">
<option value="0">Select</option>
<?php $cyear=date('Y'); for($a=$cyear; $a>=1947; $a--){?>
<option><?php echo $a ; ?></option>
<?php } ?>
</select>
</td>
<td><input type="text" name="alevelmarks" class="form-control" id="alevelmarks" value="<?=set_value('alevelmarks')?>"></td>
<td><input type="text" name="alevelinst" class="form-control" id="alevelinst" value="<?=set_value('alevelinst')?>"></td>
</tr>
<tr>
<th>International Baccalaureate</th>
<td>
<select name="intbaccyear" id="intbaccyear" class="form-control">
<option value="0">Select</option>
<?php $cyear=date('Y'); for($a=$cyear; $a>=1947; $a--){?>
<option><?php echo $a ; ?></option>
<?php } ?>
</select>
</td>
<td><input type="text" name="intbaccmarks" class="form-control" id="intbaccmarks" value="<?=set_value('intbaccmarks')?>"></td>
<td><input type="text" name="intbaccinst" class="form-control" id="intbaccinst" value="<?=set_value('intbaccinst')?>"></td>
</tr>
<tr>
<th>American High-School</th>
<td>
<select name="amhsyear" id="amhsyear" class="form-control">
<option value="0">Select</option>
<?php $cyear=date('Y'); for($a=$cyear; $a>=1947; $a--){?>
<option><?php echo $a ; ?></option>
<?php } ?>
</select>
</td>
<td><input type="text" name="amhsmarks" class="form-control" id="amhsmarks" value="<?=set_value('amhsmarks')?>"></td>
<td><input type="text" name="amhsinst" class="form-control" id="amhsinst" value="<?=set_value('amhsinst')?>"></td>
</tr>
<tr>
<th>Diploma</th>
<td>
<select name="diplyear" id="diplyear" class="form-control">
<option value="0">Select</option>
<?php $cyear=date('Y'); for($a=$cyear; $a>=1947; $a--){?>
<option><?php echo $a ; ?></option>
<?php } ?>
</select>
</td>
<td><input type="text" name="diplmarks" class="form-control" id="diplmarks" value="<?=set_value('diplmarks')?>"></td>
<td><input type="text" name="diplinst" class="form-control" id="diplinst" value="<?=set_value('diplinst')?>"></td>
</tr>

</table>
<p style="font-size:13px">Candidates who hold qualifiacations other than F.SC and Matriculation will require Equivalence Certificate from the Inter-Board Committee of Chairmen</p>

</div>

<div class="col-sm-12" style="padding:0;">
<p class="form_titlez">Appeared in Other Medical College Entry Test?</p>
                    <?php
                        if(form_error('appUHS'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="appUHS" class="control-label">
                    <?=$this->lang->line("student_appUHS")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                        <span>Yes</span>
<input type="radio" name="appUHS" id="appUHS" value="Yes" style="height:15px; width:15px;">

<span style="padding-left:20px;">No</span>
<input type="radio" name="appUHS" id="appUHS" value="No" checked style="height:15px; width:15px;">
                        </div>
                        <span class="control-label">
                            <?php echo form_error('appUHS'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('appUHSyear'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="appUHSyear" class="control-label">
                    <?=$this->lang->line("student_appUHSyear")?>
                        </label>
                        <div class="">
<select name="appUHSyear" id="appUHSyear" class="form-control">
<option value="0">Select</option>
<?php $cyear=date('Y'); for($a=$cyear; $a>=1947; $a--){?>
<option><?php echo $a ; ?></option>
<?php } ?>
</select>
                        </div>
                        <span class="control-label">
                            <?php echo form_error('appUHSyear'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('appUHSscr'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="appUHSscr" class="control-label">
                    <?=$this->lang->line("student_appUHSscr")?>
                        </label>
                        <div class="">
                            <input type="text" class="form-control" id="appUHSscr" name="appUHSscr" value="<?=set_value('appUHSscr')?>" >
                        </div>
                        <span class="control-label">
                            <?php echo form_error('appUHSscr'); ?>
                        </span>
                    </div>

</div>

<div class="col-sm-12" style="padding:0;">
                    <?php
                        if(form_error('appNUMS'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="appNUMS" class="control-label">
                    <?=$this->lang->line("student_appNUMS")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                        <span>Yes</span>
<input type="radio" name="appNUMS" id="appNUMS" value="Yes" style="height:15px; width:15px;">

<span style="padding-left:20px;">No</span>
<input type="radio" name="appNUMS" id="appNUMS" value="No" checked style="height:15px; width:15px;">
                        </div>
                        <span class="control-label">
                            <?php echo form_error('appNUMS'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('appNUMSyear'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="appNUMSyear" class="control-label">
                    <?=$this->lang->line("student_appNUMSyear")?>
                        </label>
                        <div class="">
<select name="appNUMSyear" id="appNUMSyear" class="form-control">
<option value="0">Select</option>
<?php $cyear=date('Y'); for($a=$cyear; $a>=1947; $a--){?>
<option><?php echo $a ; ?></option>
<?php } ?>
</select>
                        </div>
                        <span class="control-label">
                            <?php echo form_error('appNUMSyear'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('appNUMSscr'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="appNUMSscr" class="control-label">
                    <?=$this->lang->line("student_appNUMSscr")?>
                        </label>
                        <div class="">
                            <input type="text" class="form-control" id="appNUMSscr" name="appNUMSscr" value="<?=set_value('appNUMSscr')?>" >
                        </div>
                        <span class="control-label">
                            <?php echo form_error('appNUMSscr'); ?>
                        </span>
                    </div>
</div>

<div class="col-sm-12" style="padding:0;">
                    <?php
                        if(form_error('appOther'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="appOther" class="control-label">
                    <?=$this->lang->line("student_appOther")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                        <span>Yes</span>
<input type="radio" name="appOther" id="appOther" value="Yes" style="height:15px; width:15px;">

<span style="padding-left:20px;">No</span>
<input type="radio" name="appOther" id="appOther" value="No" checked style="height:15px; width:15px;">
                        </div>
                        <span class="control-label">
                            <?php echo form_error('appOther'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('appOtheryear'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="appOtheryear" class="control-label">
                    <?=$this->lang->line("student_appOtheryear")?>
                        </label>
                        <div class="">
<select name="appOtheryear" id="appOtheryear" class="form-control">
<option value="0">Select</option>
<?php $cyear=date('Y'); for($a=$cyear; $a>=1947; $a--){?>
<option><?php echo $a ; ?></option>
<?php } ?>
</select>
                        </div>
                        <span class="control-label">
                            <?php echo form_error('appOtheryear'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('appOtherscr'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="appOtherscr" class="control-label">
                    <?=$this->lang->line("student_appOtherscr")?>
                        </label>
                        <div class="">
                            <input type="text" class="form-control" id="appOtherscr" name="appOtherscr" value="<?=set_value('appOtherscr')?>" >
                        </div>
                        <span class="control-label">
                            <?php echo form_error('appOtherscr'); ?>
                        </span>
                    </div>
</div>

<div class="col-sm-12" style="padding:0;">
<p class="form_titlez">Status of Applicant</p>  
                    <?php
                        if(form_error('statusapp'))
echo "<div class='form-group col-sm-8 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-8' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="statusapp" class="control-label">
                    <?=$this->lang->line("student_statusapp")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                        <span>Pakistani Student</span>
<input type="radio" name="statusapp" id="statusapp" value="Pakistani" style="height:15px; width:15px;" checked>

<span style="padding-left:20px;">Overseas Pakistani Student</span>
<input type="radio" name="statusapp" id="statusapp" value="Overseas Pakistani" style="height:15px; width:15px;">

<span style="padding-left:20px;">Foreign Student</span>
<input type="radio" name="statusapp" id="statusapp" value="Foreign" style="height:15px; width:15px;">

                        </div>
                        <span class="control-label">
                            <?php echo form_error('statusapp'); ?>
                        </span>
                    </div>
</div>

<div class="col-sm-12" style="padding:0;">
                    <?php
                        if(form_error('hostelacc'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
<p class="form_titlez" style="padding:0; margin:0;">Hostel Accommodation</p>
                        <label for="hostelacc" class="control-label">
                        </label>
                        <div class="">
                        <span>Yes</span>
<input type="radio" name="hostelacc" id="hostelacc" value="1" style="height:15px; width:15px;">

<span style="padding-left:20px;">No</span>
<input type="radio" name="hostelacc" id="hostelacc" value="0" style="height:15px; width:15px;" checked>
                        </div>
                        <span class="control-label">
                            <?php echo form_error('hostelacc'); ?>
                        </span>
                    </div>
                    <?php
                        if(form_error('hostelmess'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
<p class="form_titlez" style="padding:0; margin:0;">Hostel Mess</p>
                        <label for="hostelmess" class="control-label">
                        </label>
                        <div class="">
                        <span>Yes</span>
<input type="radio" name="hostelmess" id="hostelmess" value="1" style="height:15px; width:15px;">

<span style="padding-left:20px;">No</span>
<input type="radio" name="hostelmess" id="hostelmess" value="0" style="height:15px; width:15px;" checked>
                        </div>
                        <span class="control-label">
                            <?php echo form_error('hostelmess'); ?>
                        </span>
                    </div>
                    <?php
                        if(form_error('transport'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
<p class="form_titlez" style="padding:0; margin:0;">Transport</p>
                        <label for="transport" class="control-label">
                        </label>
                        <div class="">
                        <span>Yes</span>
<input type="radio" name="transport" id="transport" value="1" style="height:15px; width:15px;">

<span style="padding-left:20px;">No</span>
<input type="radio" name="transport" id="transport" value="0" style="height:15px; width:15px;" checked>
                        </div>
                        <span class="control-label">
                            <?php echo form_error('transport'); ?>
                        </span>
                    </div>
</div>

<div class="col-sm-12" style="padding:0;">
<p class="form_titlez">Account Details</p>                   
                    <?php
                        if(form_error('photo'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="photo" class="control-label">
                            <?=$this->lang->line("student_photos")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                            <div class="input-group image-preview">
<input type="text" class="form-control image-preview-filename" disabled="disabled">
                                <span class="input-group-btn">
<button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                        <span class="fa fa-remove"></span>
                                        <?=$this->lang->line('student_clear')?>
                                    </button>
                                    <div class="btn btn-success image-preview-input">
                                        <span class="fa fa-repeat"></span>
                                        <span class="image-preview-input-title">
                                        <?=$this->lang->line('student_file_browse')?></span>
                      <input type="file" accept="image/png, image/jpeg, image/gif" name="photo"/>
                                    </div>
                                </span>
                            </div>
                        </div>

                        <span class="">
                            <?php echo form_error('photo'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('email'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="email" class="control-label">
                    <?=$this->lang->line("student_email")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                            <input type="email" class="form-control" id="email" name="email" value="<?=set_value('email')?>" >
                        </div>
                        <span class="control-label">
                            <?php echo form_error('email'); ?>
                        </span>
                    </div>
                    
                    <?php
                        if(form_error('username'))
echo "<div class='form-group col-sm-4 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-4' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="username" class="control-label">
                            <?=$this->lang->line("student_username")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                            <input type="text" class="form-control" id="username" name="username" value="<?=set_value('username')?>" >
                        </div>
                         <span class="control-label">
                            <?php echo form_error('username'); ?>
                        </span>
                    </div>
                    
</div>
<div class="col-sm-12" style="padding:0;">

                    <?php
                        if(form_error('devicecode'))
echo "<div class='form-group col-sm-3 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-3' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="devicecode" class="control-label">
                            <?=$this->lang->line("student_devicecode")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
       <input type="text" class="form-control" id="devicecode" name="devicecode" value="<?=set_value('devicecode')?>" >
                        </div>
                         <span class="control-label">
                            <?php echo form_error('devicecode'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('attcode'))
echo "<div class='form-group col-sm-3 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-3' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="attcode" class="control-label">
                            <?=$this->lang->line("student_attcode")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
          <input type="text" class="form-control" id="attcode" name="attcode" value="<?=set_value('attcode')?>" >
                        </div>
                         <span class="control-label">
                            <?php echo form_error('attcode'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('password'))
echo "<div class='form-group col-sm-3 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-3' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="password" class="control-label">
                            <?=$this->lang->line("student_password")?> <span class="text-red">*</span>
                        </label>
                        <div class="">
                            <input type="password" class="form-control" id="password" name="password" value="<?=set_value('password')?>" >
                        </div>
                         <span class="control-label">
                            <?php echo form_error('password'); ?>
                        </span>
                    </div>
                   
                    <?php
                        if(form_error('remarks'))
echo "<div class='form-group col-sm-3 has-error' style='margin-left: -1px;margin-right: -1px;'>";
                        else
echo "<div class='form-group col-sm-3' style='margin-left: -1px;margin-right: -1px;'>";
                    ?>
                        <label for="remarks" class="control-label">
                            <?=$this->lang->line("student_remarks")?>
                        </label>
                        <div class="">
                            <input type="text" class="form-control" id="remarks" name="remarks" value="<?=set_value('remarks')?>" >
                        </div>
                        <span class="control-label">
                            <?php echo form_error('remarks'); ?>
                        </span>
                    </div>

</div>
                    <div class="form-group">
<div class="col-sm-12">
<input type="submit" class="btn btn-success" value="<?=$this->lang->line("add_student")?>" style="float:right; margin-right:20px;">
                        </div>
                    </div>
                </form>

                <?php if ($siteinfos->note==1) { ?>
                    <div class="callout callout-danger">
                        <p><b>Note:</b> Create teacher, class, section before create a new student.</p>
                    </div>
                <?php } ?>
            </div> <!-- col-sm-8 -->

        </div><!-- row -->
    </div><!-- Body -->
</div><!-- /.box -->

<script>
    $(document).ready(function(){
        $('#chkSame').click(function(){
            if($(this).prop("checked") == true){
               
			   $('#paddress').val($('#address').val());
			   $('#pstate').val($('#state').val());
			   $('#pcity').val($('#city').val());
			   $('#ppcode').val($('#pcode').val());
			   
            }
			else
			{
			   $('#paddress').val('');
			   $('#pstate').val('');
			   $('#pcity').val('');
			   $('#ppcode').val('');
			}
        });
    });
</script>

<script type="text/javascript">
$( ".select2" ).select2();

$('#dob').datepicker({ startView: 2 });

$('#username').keyup(function() {
    $(this).val($(this).val().replace(/\s/g, ''));
});


$('#classesID').change(function(event) {
    var classesID = $(this).val();
    if(classesID === '0') {
        $('#sectionID').val(0);
    } else {
        $.ajax({
            async: false,
            type: 'POST',
            url: "<?=base_url('student/sectioncall')?>",
            data: "id=" + classesID,
            dataType: "html",
            success: function(data) {
               $('#sectionID').html(data);
            }
        });

        $.ajax({
            async: false,
            type: 'POST',
            url: "<?=base_url('student/optionalsubjectcall')?>",
            data: "id=" + classesID,
            dataType: "html",
            success: function(data2) {
                $('#optionalSubjectID').html(data2);
            }
        });
    }
});

$(document).on('click', '#close-preview', function(){
    $('.image-preview').popover('hide');
    // Hover befor close the preview
    $('.image-preview').hover(
        function () {
           $('.image-preview').popover('show');
           $('.content').css('padding-bottom', '100px');
        },
         function () {
           $('.image-preview').popover('hide');
           $('.content').css('padding-bottom', '20px');
        }
    );
});

$(function() {
    // Create the close button
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    // Set the popover default content
    $('.image-preview').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    // Clear event
    $('.image-preview-clear').click(function(){
        $('.image-preview').attr("data-content","").popover('hide');
        $('.image-preview-filename').val("");
        $('.image-preview-clear').hide();
        $('.image-preview-input input:file').val("");
        $(".image-preview-input-title").text("<?=$this->lang->line('student_file_browse')?>");
    });
    // Create the preview image
    $(".image-preview-input input:file").change(function (){
        var img = $('<img/>', {
            id: 'dynamic',
            width:250,
            height:200,
            overflow:'hidden'
        });
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-input-title").text("<?=$this->lang->line('student_file_browse')?>");
            $(".image-preview-clear").show();
            $(".image-preview-filename").val(file.name);
            img.attr('src', e.target.result);
            $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
            $('.content').css('padding-bottom', '100px');
        }
        reader.readAsDataURL(file);
    });
});
</script>
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>

<script>
    $(":input").inputmask();
</script>