<noscript>  <meta http-equiv="refresh" content="1; URL=cterror.html" /></noscript>
<!--<script>
    function PopIt() {
        return "Are you sure you want to leave?";
    }
    function UnPopIt() { /* nothing to return */
    }

    $(document).ready(function () {
        window.onbeforeunload = PopIt;
        $("a").click(function () {
            window.onbeforeunload = UnPopIt;
        });
    });
    
</script>-->
<?php
echo $this->Html->script('http://www.google.com/jsapi');
echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js');

?>
<?php
echo $this->Html->script('jquery.dataTables.min');
?>
<script>
    google.load("elements", "1", {packages: "transliteration"});
    function OnLoad() {
        var options = {
            sourceLanguage:
                    google.elements.transliteration.LanguageCode.ENGLISH,
            destinationLanguage:
                    [google.elements.transliteration.LanguageCode.MARATHI],
                    //[google.elements.transliteration.LanguageCode.KANNADA],
                    //[google.elements.transliteration.LanguageCode.GUJARATI],
                    //[google.elements.transliteration.LanguageCode.HINDI],
            shortcutKey: 'ctrl+g',
            transliterationEnabled: true
        };

        var control = new google.elements.transliteration.TransliterationControl(options);
        control.makeTransliteratable(["district_name_ll"]);
        var keyVal = 32; // Space key
        $("#district_name_en").on('keydown', function (event) {
            if (event.keyCode === 32) {
                var engText = $("#district_name_en").val().trim() + " ";
                var engTextArray = engText.split(" ");
                $("#district_name_ll").val($("#district_name_ll").val() + engTextArray[engTextArray.length - 2]);

                document.getElementById("district_name_ll").focus();
                $("#district_name_ll").trigger({
                    type: 'keypress', keyCode: keyVal, which: keyVal, charCode: keyVal
                });
            }
        });

        $("#district_name_ll").bind("keyup", function (event) {
            setTimeout(function () {
                $("#district_name_en").val($("#district_name_en").val() + " ");
                document.getElementById("district_name_en").focus()
            }, 0);
        });
    } //end onLoad function

    google.setOnLoadCallback(OnLoad);

</script>

<script>

    $(document).ready(function () {
//         alert($("#hfhidden1").val());

        var hfupdateflag = "<?php echo $hfupdateflag; ?>";

        if (hfupdateflag == 'Y')
        {
            $('#btnadd').html('Save');
        }

        if ($('#hfhidden1').val() == 'Y')
        {
            // 

            $('#tabledivisionnew').dataTable({
                "iDisplayLength": 10,
                "aLengthMenu": [[10, 15, 20, -1], [10, 15, 20, "All"]]
            });


        }
    });


</script>
<script>

    function formadd() {

        var district_name_en = $('#district_name_en').val();


        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        var numbers = /^[0-9]+$/;
        var Alphanum = /^(?=.*?[a-zA-Z])[0-9a-zA-Z]+$/;
        var Alphanumdot = /^(?=.*?[a-zA-Z])[0-9a-zA-Z.]+$/;
        var password = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[#,@]).{8,}/;
        var alphbets = /^[a-z A-Z ]+$/;
        var alphbetscity = /^[ A-Za-z-() ]*$/;
        var alphanumnotspace = /^[0-9a-zA-Z]+$/;
        var alphanumsapcedot = /^(?=.*?[a-zA-Z])[0-9 a-zA-Z,.\-_]+$/;

        if (district_name_en == '') {

            $('#district_name').focus();
            alert('Please insert district name');
            return false;
        }
//        if (!district_name_en.match(Alphanum) || district_name_en.length > 100)
//        {
//            $('#district_name_en').focus();
//            alert('Only Alphabets are allowed in Desciption');
//            return false;
//        }

        document.getElementById("actiontype").value = '1';
        document.getElementById("hfaction").value = 'S';
    }

    function formupdate(district_name_en,district_name_ll,id) {        
        document.getElementById("actiontype").value = '1';
        $('#district_name_en').val(district_name_en);
        $('#district_name_ll').val(district_name_ll);
        $('#hfupdateflag').val('Y');
        $('#hfid').val(id);
        $('#btnadd').html('Save');
	return false;
    }

    function formdelete(id) {

        document.getElementById("actiontype").value = '3';
        document.getElementById("hfid").value = id;

    }

</script> 

<?php echo $this->Form->create('district_new'); ?>

   

    <div class="panel-body">
        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading" style="text-align: center;"><big><b><?php echo __('lbladmdistrict'); ?></b></big></div>

                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body">
                          <div class="row">
                            <div class="form-group">
                                <div class="col-sm-2">&nbsp;</div>
                                <label for="division_name_en" class="col-sm-2 control-label"><?php echo __('lbladmdistrict'); ?><span style="color: #ff0000">*</span></label>    
                                <div class="col-sm-3">
                                    <?php echo $this->Form->input('district_name_en', array('label' => false, 'id' => 'district_name_en', 'class' => 'form-control input-sm', 'type' => 'text')) ?>
                                </div>

                                <div class="col-sm-3">
                                    <?php echo $this->Form->input('district_name_ll', array('label' => false, 'id' => 'district_name_ll', 'class' => 'form-control input-sm', 'type' => 'text')) ?>
                                </div>
                                <div class="col-sm-1 tdselect">
                                    <button id="btnadd" name="btnadd" class="btn btn-info " style="text-align: center;" 
                                            onclick="javascript: return formadd();">
                                        <span class="glyphicon glyphicon-plus"><?php //echo $this->Html->image('Add.png');        ?></span><?php echo __('lblAdd'); ?>
                                    </button>
                                </div>

                            </div>

                        </div><br><br>
                        
                              
                                    <table id="tabledivisionnew" class="table table-striped table-bordered table-condensed">  
                                        <thead style="background-color: rgb(243, 214, 158);">  
                                            <tr>  
                                                <td style="text-align: center; width: 10%;"><?php echo __('lblstate'); ?></td>
                                                  <?php if ($this->Session->read("sess_langauge") == 'en') { ?>
                                                <td style="text-align: center;"><?php echo __('lblDistrictname'); ?></td>
                                                 <td style="text-align: center;"><?php echo __('lblDistrictname_ll'); ?></td>
                                                 <?php } else { ?>
                                                <td style="text-align: center;"><?php echo __('lblDistrictname_ll'); ?></td>
                                                <td style="text-align: center;"><?php echo __('lblDistrictname'); ?></td>
                                                <?php } ?>
                                                <td style="text-align: center; width: 10%;"><?php echo __('lblaction'); ?></td>

                                            </tr>  
                                        </thead>

                                        
                                        <tr>
                                            <?php foreach ($districtrecord as $districtrecord1): ?>

                                                <td style="text-align: center"><?php echo $state; ?></td>

                                                <?php if ($this->Session->read("sess_langauge") == 'en') { ?>
                                                 
                                                    <td style="text-align: center;"><?php echo $districtrecord1['District']['district_name_en']; ?></td>
                                                    <td style="text-align: center;"><?php echo $districtrecord1['District']['district_name_ll']; ?></td>
                                                    <td style="text-align: center;">
                                                        <button id="btnupdate" name="btnupdate" class="btn btn-default " style="text-align: center;" onclick="javascript: return formupdate(('<?php echo $districtrecord1['District']['district_name_en']; ?>'),('<?php echo $districtrecord1['District']['district_name_ll']; ?>'),
                                                                                ('<?php echo $districtrecord1['District']['id']; ?>'));">
                                                                                    <span class="glyphicon glyphicon-pencil"><?php //echo $this->Html->image('edit.png');     ?></span><?php //echo __('lblbtnupdate'); ?></button>

                                                        <button id="btndelete" name="btndelete" class="btn btn-default " style="text-align: center;" 
                                                                onclick="javascript: return formdelete(('<?php echo $districtrecord1['District']['id']; ?>'));">
                                                                    <span class="glyphicon glyphicon-remove"><?php //echo $this->Html->image('delete.png');     ?></span><?php //echo __('lblbtndelete'); ?></button>
                                                    </td>
                                                <?php } else { ?>
                                                      <td style="text-align: center;"><?php echo $districtrecord1['District']['district_name_ll']; ?></td>
                                                    <td style="text-align: center;"><?php echo $districtrecord1['District']['district_name_en']; ?></td>
                                                   
                                                    <td style="text-align: center;">
                                                        <button id="btnupdate" name="btnupdate" class="btn btn-default " style="text-align: center;" onclick="javascript: return formupdate(('<?php echo $districtrecord1['District']['district_name_ll']; ?>'),('<?php echo $districtrecord1['District']['district_name_en']; ?>'),
                                                                                ('<?php echo $districtrecord1['District']['id']; ?>'));">
                                                                                    <span class="glyphicon glyphicon-pencil"><?php //echo $this->Html->image('edit.png');     ?></span><?php //echo __('lblbtnupdate'); ?></button>

                                                        <button id="btndelete" name="btndelete" class="btn btn-default " style="text-align: center;" 
                                                                onclick="javascript: return formdelete(('<?php echo $districtrecord1['District']['id']; ?>'));">
                                                                    <span class="glyphicon glyphicon-remove"><?php //echo $this->Html->image('delete.png');     ?></span><?php //echo __('lblbtndelete'); ?></button>
                                                    </td>
                                                <?php } ?>
                                            </tr>
                                        <?php endforeach;
                                        ?>
                                        <?php unset($districtrecord1); ?>


                                       
                                    </table> 
                                </div>
                                <div class="row col-sm-2">&nbsp;</div>
                                <?php
                                if (!empty($districtrecord)) {
                                    ?>
                                    <input type="hidden" value="Y" id="hfhidden1"/><?php } else { ?>
                                    <input type="hidden" value="N" id="hfhidden1"/><?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
          
                
            </div>
        </div>
         <input type='hidden' value='<?php echo $actiontypeval; ?>' name='actiontype' id='actiontype'/>
                                        <input type='hidden' value='<?php echo $hfactionval; ?>' name='hfaction' id='hfaction'/>
                                        <input type='hidden' value='<?php echo $hfid; ?>' name='hfid' id='hfid'/>
                                        <input type='hidden' value='<?php echo $hfupdateflag; ?>' name='hfupdateflag' id='hfupdateflag'/>
    </div>


<?php echo $this->Form->end(); ?>
<?php echo $this->Js->writeBuffer(); ?>

