<?php

define("APP_URL", URL::to('/'));



# Get the Cookie
function get_cookie($cookie_name){
    if(isset($_COOKIE[$cookie_name])) {
        echo $_COOKIE[$cookie_name];
    }
}

# Set the Submitted Form Data in Session
# Here When Update Request We Set it Here
function set_form_session_data(array $data) {
    delete_form_session_data();
    $_SESSION["form_data_submit_or_update"] = $data;
}

function delete_form_session_data() {
    $_SESSION["form_data_submit_or_update"] = array();
}

# This Helper Function Help to Get Session data Form
function get_form_session_data($name) {

    if (isset($_SESSION["form_data_submit_or_update"])) {
        if (isset($_SESSION["form_data_submit_or_update"][$name])) {
            # check if it is a object
            # because it is a lazy loading object so return its it
            # The request is asking for id
            if (is_object($_SESSION["form_data_submit_or_update"][$name])) {
                return $_SESSION["form_data_submit_or_update"][$name]->id;
            }
            return $_SESSION["form_data_submit_or_update"][$name];
        }
    }

    return false;
}

function form_open($class = "", $id = "", $action = false, $method = "post", $file_upload = false, $attr = false) {
    if ($file_upload) {
        $file_upload = "enctype='multipart/form-data'";
    }
    echo <<<EOD
    <form id="$id" class="$class" action="$action" method="$method" $file_upload $attr>
EOD;
}

function form_close() {
    echo "\n</from>\n";
}

function form_hidden($name, $value)
{
    echo <<<eod
    <input type="hidden" name="$name" value="$value" id="$name">
eod;
}

function form_input($name, $value = false, $required = true, $label_name = false, $type = "text", $placeholder = false, $main_div_class = "form-group row", $label_class = "col-lg-3 control-label text-lg-right pt-2", $label_wrapper = "strong", $parent_input_div_class = "col-lg-6", $input_class = "form-control") {

    # Check if Multiple
    $multiple = false;
    if (strpos($name, '[]') !== false) {
        $multiple = true;
        # Formate The name
        $name = str_replace("[]", "", $name);
    }

    if($name == "email"){
        $type = "email";
    }

    $label_name_is = ucwords(str_replace("_", " ", $name));
    if ($label_name) {
        $label_name_is = ucwords($label_name);
    }

    # Adding the Wrapper
    if ($label_wrapper) {
        $label_name_is = "<$label_wrapper>" . $label_name_is . "</$label_wrapper>";
    }

    $placeholder_name_is = ucwords(str_replace("_", " ", $name));

    if ($placeholder) {
        $placeholder_name_is = ucwords($placeholder);
    }

    $required_is = NULL;
    if ($required) {
        $required_is = "required";
    }

    # Support the id
    $id = $name;

    # Support the multiple
    if( $multiple ){
        $name = $name."[]";
    }
    # End Support the multiple

    # Get the Value

    echo <<<EOT
    <div class="$main_div_class">
    <label class="$label_class" for="$name">$label_name_is</label>
    <div class="$parent_input_div_class">
    <input type="$type" name="$name" value="$value" placeholder="$placeholder_name_is" class="$input_class $id" id="$id"  $required_is>
    </div>
    </div>
EOT;
}

function form_input_number($name, $value = false, $required = true, $label_name = false, $type = "number", $placeholder = false, $main_div_class = "form-group row", $label_class = "col-lg-3 control-label text-lg-right pt-2", $label_wrapper = "strong", $parent_input_div_class = "col-lg-6", $input_class = "form-control") {

    # Check if Multiple
    $multiple = false;
    if (strpos($name, '[]') !== false) {
        $multiple = true;
        # Formate The name
        $name = str_replace("[]", "", $name);
    }

    if($name == "email"){
        $type = "email";
    }

    $label_name_is = ucwords(str_replace("_", " ", $name));
    if ($label_name) {
        $label_name_is = ucwords($label_name);
    }

    # Adding the Wrapper
    if ($label_wrapper) {
        $label_name_is = "<$label_wrapper>" . $label_name_is . "</$label_wrapper>";
    }

    $placeholder_name_is = ucwords(str_replace("_", " ", $name));

    if ($placeholder) {
        $placeholder_name_is = ucwords($placeholder);
    }

    $required_is = NULL;
    if ($required) {
        $required_is = "required";
    }

    # Support the id
    $id = $name;

    # Support the multiple
    if( $multiple ){
        $name = $name."[]";
    }
    # End Support the multiple

    # Get the Value

    echo <<<EOT
    <div class="$main_div_class">
    <label class="$label_class" for="$name">$label_name_is</label>
    <div class="$parent_input_div_class">
    <input type="$type" name="$name" value="$value" placeholder="$placeholder_name_is" class="$input_class $id" id="$id"  $required_is>
    </div>
    </div>
EOT;
}

function form_input_password($name, $value = false, $required = true, $label_name = false, $type = "password", $placeholder = false, $main_div_class = "form-group row", $label_class = "col-lg-3 control-label text-lg-right pt-2", $label_wrapper = "strong", $parent_input_div_class = "col-lg-6", $input_class = "form-control") {

    $label_name_is = ucwords(str_replace("_", " ", $name));
    if ($label_name) {
        $label_name_is = ucwords($label_name);
    }

    # Adding the Wrapper
    if ($label_wrapper) {
        $label_name_is = "<$label_wrapper>" . $label_name_is . "</$label_wrapper>";
    }

    $placeholder_name_is = ucwords(str_replace("_", " ", $name));

    if ($placeholder) {
        $placeholder_name_is = ucwords($placeholder);
    }

    $required_is = NULL;
    if ($required) {
        $required_is = "required";
    }

    # Get the Value

    echo <<<EOT
    <div class="$main_div_class">
    <label class="$label_class" for="$name">$label_name_is</label>
    <div class="$parent_input_div_class">
    <input type="$type" name="$name" value="$value" placeholder="$placeholder_name_is" class="$input_class" id="$name"  $required_is>
    </div>
    </div>
EOT;
}

function form_input_date($name, $value = false, $required = true, $label_name = false, $add_date_attr = "data-plugin-datepicker", $type = "text", $placeholder = false, $main_div_class = "form-group row date_main_div", $label_class = "col-lg-3 control-label text-lg-right pt-2", $label_wrapper = "strong", $parent_input_div_class = "col-lg-6", $input_class = "form-control") {

    $label_name_is = ucwords(str_replace("_", " ", $name));
    if ($label_name) {
        $label_name_is = ucwords($label_name);
    }

    # Adding the Wrapper
    if ($label_wrapper) {
        $label_name_is = "<$label_wrapper>" . $label_name_is . "</$label_wrapper>";
    }

    $placeholder_name_is = ucwords(str_replace("_", " ", $name));

    if ($placeholder) {
        $placeholder_name_is = ucwords($placeholder);
    }

    $required_is = NULL;
    if ($required) {
        $required_is = "required";
    }



    echo <<<EOT
    <div class="$main_div_class">
    <label class="$label_class" for="$name">$label_name_is</label>
    <div class="$parent_input_div_class">
    <input type="$type" name="$name" $add_date_attr value="$value" placeholder="$placeholder_name_is" class="$input_class" id="$name" $required_is>
    </div>
    </div>
EOT;
}

function form_input_date_range($name, $value = false, $required = true, $label_name = false, $add_date_attr = "", $type = "text", $placeholder = false, $main_div_class = "form-group row date_range_main", $label_class = "col-lg-3 control-label text-lg-right pt-2", $label_wrapper = "strong", $parent_input_div_class = "col-lg-6", $input_class = "form-control date_range_picker") {

    $label_name_is = ucwords(str_replace("_", " ", $name));
    if ($label_name) {
        $label_name_is = ucwords($label_name);
    }

    # Adding the Wrapper
    if ($label_wrapper) {
        $label_name_is = "<$label_wrapper>" . $label_name_is . "</$label_wrapper>";
    }

    $placeholder_name_is = ucwords(str_replace("_", " ", $name));

    if ($placeholder) {
        $placeholder_name_is = ucwords($placeholder);
    }

    $required_is = NULL;
    if ($required) {
        $required_is = "required";
    }



    echo <<<EOT
    <div class="$main_div_class">
    <label class="$label_class" for="$name">$label_name_is</label>
    <div class="$parent_input_div_class">
    <input type="$type" name="$name" $add_date_attr value="$value" placeholder="$placeholder_name_is" class="$input_class" id="$name" $required_is>
    </div>
    </div>
EOT;
}

function form_input_file($name, $required = true, $multiple_file = false, $label_name = false, $add_date_attr = false, $main_div_class = "form-group row", $label_class = "col-lg-3 control-label text-lg-right pt-2", $label_wrapper = "strong", $parent_input_div_class = "col-lg-6", $input_class = "form-control") 
{
    $originalName = $name;
    $name = str_replace("[]", "", $name);

    $label_name_is = ucwords(str_replace("_", " ", $name));
    if ($label_name) {
        $label_name_is = ucwords($label_name);
    }


    # Adding the Wrapper
    if ($label_wrapper) {
        $label_name_is = "<$label_wrapper>" . $label_name_is . "</$label_wrapper>";
    }

    $required_is = NULL;
    if ($required) {
        $required_is = "required";
    }

    # Support the id
    $id = $name;

    # if multiple file upload
    if($multiple_file){
        $multiple_file = "multiple";
        //$name = $name."[]";
    }

    $name = $originalName;
   

    echo <<<EOT
    <div class="$main_div_class">
    <label class="$label_class" for="$id">$label_name_is</label>
    <div class="$parent_input_div_class">

    <div class="fileupload fileupload-new" data-provides="fileupload">
        <div class="input-append">
            <div class="uneditable-input">
                <i class="fas fa-file fileupload-exists"></i>
                <span class="fileupload-preview"></span>
            </div>
            <span class="btn btn-default btn-file">
                <span class="fileupload-exists">Change</span>
                <span class="fileupload-new">Select file</span>
                <input type="file" name="$name" $add_date_attr  id="$id" $multiple_file $required_is />
                <span $input_class></span>
            </span>
            <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
        </div>
    </div>

    </div>
    </div>
EOT;
}

function form_textarea($name, $value = false, $required = true, $label_name = false, $rows = 3, $placeholder = false, $main_div_class = "form-group row", $label_class = "col-lg-3 control-label text-lg-right pt-2", $label_wrapper = "strong", $parent_input_div_class = "col-lg-6", $input_class = "form-control") {

    $label_name_is = ucwords(str_replace("_", " ", $name));
    // if the name set as array remove the array sign
    $label_name_is = (str_replace("[]", "", $label_name_is));
    if ($label_name) {
        $label_name_is = ucwords($label_name);
    }

    # Adding the Wrapper
    if ($label_wrapper) {
        $label_name_is = "<$label_wrapper>" . $label_name_is . "</$label_wrapper>";
    }

    $placeholder_name_is = ucwords(str_replace("_", " ", $name));
    $placeholder_name_is = ucwords(str_replace("[]", "", $placeholder_name_is));

    if ($placeholder) {
        $placeholder_name_is = ucwords($placeholder);
    }

    $required_is = NULL;
    if ($required) {
        $required_is = "required";
    }

    echo <<<EOT
    <div class="$main_div_class">
    <label class="$label_class" for="$name">$label_name_is</label>
    <div class="$parent_input_div_class">
    <textarea name="$name" placeholder="$placeholder_name_is" class="$input_class" id="$name" $required_is rows="$rows">$value</textarea>
    </div>
    </div>
EOT;
}

function form_textarea_html($name, $value = false,  $required = true, $label_name = false, $rows = 3, $placeholder = false, $main_div_class = "form-group row", $label_class = "col-lg-3 control-label text-lg-right pt-2", $label_wrapper = "strong", $parent_input_div_class = "col-lg-6", $input_class = "form-control summernote") {

    $label_name_is = ucwords(str_replace("_", " ", $name));
    if ($label_name) {
        $label_name_is = ucwords($label_name);
    }

    # Adding the Wrapper
    if ($label_wrapper) {
        $label_name_is = "<$label_wrapper>" . $label_name_is . "</$label_wrapper>";
    }

    $placeholder_name_is = ucwords(str_replace("_", " ", $name));

    if ($placeholder) {
        $placeholder_name_is = ucwords($placeholder);
    }

    $required_is = NULL;
    if ($required) {
        $required_is = "required";
    }


    echo <<<EOT
    <div class="$main_div_class">
    <label class="$label_class" for="$name">$label_name_is</label>
    <div class="$parent_input_div_class">
    <textarea name="$name" placeholder="$placeholder_name_is" class="$input_class" id="$name" data-plugin-summernote data-plugin-options='{ "height": 180, "codemirror": { "theme": "ambiance" } }' $required_is rows="$rows">$value</textarea>

    </div>
    </div>
EOT;
}

function form_select($name, array $value, $default_select = false, $required = true, $label_name = false, $main_div_class = "form-group row", $label_class = "col-lg-3 control-label text-lg-right pt-2", $label_wrapper = "strong", $parent_input_div_class = "col-lg-6", $input_class = "form-control populate") {

    $label_name_is = ucwords(str_replace("_", " ", $name));
    // if the name set as array remove the array sign
    $label_name_is = (str_replace("[]", "", $label_name_is));

    if ($label_name) {
        $label_name_is = ucwords($label_name);
    }

    # Adding the Wrapper
    if ($label_wrapper) {
        $label_name_is = "<$label_wrapper>" . $label_name_is . "</$label_wrapper>";
    }

    $required_is = NULL;
    if ($required) {
        $required_is = "required";
    }


    echo <<<EOT
        <div class="$main_div_class">
        <label class="$label_class" for="$name">$label_name_is</label>
        <div class="$parent_input_div_class">
        <select name="$name" class="$input_class" id="$name" $required_is>
EOT;
    if ($value) {
        # This is the Default One
        echo "<option value>--Select One--</option>";

        foreach ($value as $k => $v) {
            if (in_array("$k", array($default_select))) {
                echo '<option value="' . $k . '" selected>' . $v . '</option>';
            } else {
                echo '<option value="' . $k . '">' . $v . '</option>';
            }

        }

    }

    echo <<<EOT
        </select>
        </div>
        </div>
EOT;

}


function form_select_multiple($name, array $value, $required = true, $label_name = false, $default_select = false, $main_div_class = "form-group row", $label_class = "col-lg-3 control-label text-lg-right pt-2", $label_wrapper = "strong", $parent_input_div_class = "col-lg-6", $input_class = "form-control populate") {

    $label_name_is = ucwords(str_replace("_", " ", $name));
    // if the name set as array remove the array sign
    $label_name_is = (str_replace("[]", "", $label_name_is));

    if ($label_name) {
        $label_name_is = ucwords($label_name);
    }

    # Adding the Wrapper
    if ($label_wrapper) {
        $label_name_is = "<$label_wrapper>" . $label_name_is . "</$label_wrapper>";
    }

    $required_is = NULL;
    if ($required) {
        $required_is = "required";
    }

    # Get the Value
    $select_value = get_form_session_data(str_replace("[]", "", $name));
    // Make the data as array ...
    $select_value =  explode(",", $select_value);
    echo <<<EOT
        <div class="$main_div_class">
        <label class="$label_class" for="$name">$label_name_is</label>
        <div class="$parent_input_div_class">
        <select data-plugin-selectTwo name="$name" class="$input_class" id="$name" $required_is multiple>
EOT;
    if ($value) {
        # This is the Default One
        foreach ($value as $k => $v) {
            if (in_array("$k", array_merge( $select_value, [$default_select])) ) {
                echo '<option value="' . $k . '" selected>' . $v . '</option>';
            } else {
                echo '<option value="' . $k . '">' . $v . '</option>';
            }

        }

    }

    echo <<<EOT
        </select>
        </div>
        </div>
EOT;

}

function radio_checkbox_wrapper_start($name = "chekbox", $label_wrapper = "strong", $main_div_class = "form-group row", $label_class = "col-lg-3 control-label text-lg-right pt-2") {
    $label_for = str_replace(" ", "_", $name);

    if ($label_wrapper) {
        $name = "<$label_wrapper>{$name}</$label_wrapper>";
    }

    echo <<<EOD
    <div class="$main_div_class">
    <label class="$label_class" for="$label_for">$name</label>
EOD;
}

function radio_checkbox_wrapper_end() {
    echo "</div>";
}

function form_checkbox($name, $value, $label_name = false, $id = false, $required = true, $cheked = false, $main_div_class = "default", $label_wrapper = "strong") {

    $main_div_class_is = "checkbox-custom checkbox-";
    $main_div_class_is .= $main_div_class;

    $label_name_is = ucwords(str_replace("_", " ", $value));
    if ($label_name) {
        $label_name_is = ucwords($label_name);
    }

    # Id
    $id_is = str_replace(" ", "_", $value);
    if ($id) {
        $id_is = $id;
    }

    # Adding the Wrapper
    if ($label_wrapper) {
        $label_name_is = "<$label_wrapper>" . $label_name_is . "</$label_wrapper>";
    }

    $required_is = NULL;
    if ($required) {
        $required_is = "required";
    }

    # Is Checked
    $is_cheked = NULL;
    if ($cheked) {
        $is_cheked = "checked";
    }

    $value_is = get_form_session_data($name);
    if ($value == $value_is) {

        $is_cheked = "checked";
    }

    echo <<<EOD
    <div class="$main_div_class_is" style="margin-right: 20px;">
        <input type="checkbox" name="$name" value="$value" $is_cheked id="$id_is" $required_is>
        <label for="$id_is">$label_name_is</label>
    </div>
EOD;

}

function form_radio($name, $value, $label_name = false, $cheked = false, $id = false, $required = false, $main_div_class = "default", $label_wrapper = "strong") {

    $main_div_class_is = "radio-custom radio-";
    $main_div_class_is .= $main_div_class;

    $label_name_is = ucwords(str_replace("_", " ", $value));
    if ($label_name) {
        $label_name_is = ucwords($label_name);
    }

    # Id
    $id_is = str_replace(" ", "_", $value);
    if ($id) {
        $id_is = $id;
    }

    # Adding the Wrapper
    if ($label_wrapper) {
        $label_name_is = "<$label_wrapper>" . $label_name_is . "</$label_wrapper>";
    }

    $required_is = NULL;
    if ($required) {
        $required_is = "required";
    }

    # Is Checked
    $is_cheked = NULL;
    if ($cheked) {
        $is_cheked = "checked";
    }

    $value_is = get_form_session_data($name);
    if ($value == $value_is) {

        $is_cheked = "checked";
    }

    echo <<<EOD
    <div class="$main_div_class_is" style="margin-right: 20px;">
        <input type="radio" name="$name" value="$value" $is_cheked  id="$id_is" $required_is>
        <label for="$id_is">$label_name_is</label>
    </div>
EOD;

}


function simple_checkbox($name, $value, $required = false, $cheked = false, $id, $label, $css = "margin-top: 40px;margin-bottom: 40px;margin-right: 20px;margin-left: 26%;")
{
    $required_is = NULL;

    if( $required ){
        $required_is = "required";
    }

    # Is Checked
    $is_cheked = NULL;
    if ($cheked) {
        $is_cheked = "checked";
    }

    echo <<<EOD

    <div class="checkbox-custom checkbox-default" style="{$css}">
            <input type="checkbox" name="{$name}" value="{$value}" id="{$id}" $required_is $is_cheked >
            <label for="{$id}"><strong>{$label}</strong></label>
        </div>
EOD;

}

function form_submit($name = "submit", $value = false, $input_class = "success", $label_class = "col-md-4", $parent_input_div_class = "col-lg-6", $main_div_class = "form-group row", $style='') {
    $value_is = $name;
    if ($value) {
        $value_is = $value;
    }

    $input_class_is = "btn btn-";
    $input_class_is .= $input_class;

    echo <<<EOT
    <div class="$main_div_class">
    <div class="$parent_input_div_class">
    <input style="$style" type="submit" name="$name" value="$value_is" class="$input_class_is" id="$name">
    </div>
    </div>
EOT;
}

/**
 *
 * table_view Helper
 *
 */

function table_view($title = false, $th, $td, $view = true, $edit = true, $delete = true, $other_actions = [], $action = "Actions", $datatable_id = "datatable-tabletools_ignore", $wantState = false) {

    // dd($view);

    echo <<< EOD
    <div class="row">
        <div class="col">
            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                    </div>

                    <h2 class="card-title">$title</h2>
                </header>
                <div class="card-body">
                    <table class="table table-bordered table-striped mb-0 datatable-arafat" id="$datatable_id">
                        <thead>
                            <tr>
EOD;
    # Printing the Table Header ...........
    $id = NULL;
    if (is_object($th) || is_array($th)) {
        foreach ($th as $k => $v) {
            echo "<th>$v</th>";
        }
    }
    # Check if action is set ....
    if ($action) {
        echo "<th>$action</th>";
    }
    # End Printing The Table Header .....

    echo <<<EOD
        </tr>
    </thead>
    <tbody>
EOD;
    # Now Printg the data Using 2 Foreach
    if (is_object($td) || is_array($td)) {
        foreach ($td as $k => $v) {
            echo "<tr>";
            foreach ($v as $kk => $vv) {
                if ($kk == "id") {
                    $id = $vv;
                } else {
                    $has_active_deactice_feature = 0;

                    # For Active inActive Checking...
                    if( $kk == "status" ){

                        $has_active_deactice_feature = 1;
                        $status = $vv;
                        if($wantState == false)
                        {
                            if($vv == 0){

                                $vv = "<strong>Deactive</strong>";
                            }else{
                                $vv = "<strong>Active</strong>";
                            }
                        }


                    }

                    # For image

                    if($kk == "image"){

                        $img = APP_URL."/".$vv;

                        $vv = "<img src='".$img."' width='200px' height='150px'>";
                    }


                    echo "<td>$vv</td>";
                }
            }

            # If Actions is Set Then
            if ($action) {
                echo "<td style='white-space: nowrap;'>";
                if ($view) {
                    echo <<<EOD
                    <a href="$view/$id "><buttons  class="btn btn-primary" disabled="disabled"><i class="fas fa-eye"></i></button></a>
EOD;
                }

                if ($edit) {
                    echo <<<EOD
                    <a href="$edit/$id">
                       <buttons  class="btn btn-success" disabled="disabled"><i class="fas fa-edit"></i></button>
                    </a>
EOD;
                }

                # Inject Others Actions Here..

                if( !empty(is_array($other_actions)) ){
                    foreach($other_actions as $action_key => $action_val){

                    # Matching Get part and process it
                    if(strpos($action_val, "?") !== false){
                        $url = $action_val."&id=$id";
                    }else{
                        $url = $action_val."/$id";
                    }
                    # End matching Get Part and Process it...


                    # Code for Active Deactive Feature

                    if( $has_active_deactice_feature ){

                        $statusMenuName = "Deactive";

                        if($status == 0){
                            $statusMenuName = "Active";
                        }

                        $otherActionName = str_replace("status", $statusMenuName, $action_key);

                        echo <<<EOD
                        <a href="$url" onclick="return confirm('Are you Sure You wanna $statusMenuName This User?')">
                           <buttons  class="btn btn-info" disabled="disabled"> $otherActionName </button>
                        </a>
EOD;
                    }

                    # End Code for Active Deactive Feature
                    else {

                    echo <<<EOD
                    <a href="$url" target=_blank>
                       <buttons  class="btn btn-info" disabled="disabled"> $action_key </button>
                    </a>
EOD;
                    }

                    }
                }

                # End Inject Others Actions Here ..

                if ($delete) {
                    echo <<<EOD

                    <a href="$delete/$id" onclick="return confirm('are you sure You Wanna Delete ? It Will Batch delete Data From Multiple Table Where It is Related to ! ')">
                        <buttons  class="btn btn-danger" disabled="disabled"><i class="far fa-trash-alt"></i></button>
                    </a>
EOD;
                }

                echo "</td>";
            }
            echo "</tr>";
        }
    }
# Now Close All the Previous Open Tags
    echo <<<EOD
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>
EOD;
}

function details_table_view($title = false, $data) {
    echo <<< EOD
    <div class="row">
        <div class="col">
            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                    </div>

                    <h2 class="card-title">$title</h2>
                </header>
                <div class="card-body">
                    <table class="table table-bordered table-striped mb-0">
                        <tbody>
EOD;
    if (is_object($data) || is_array($data)) {
        if ($data) {
            // pr($data);
            foreach ($data as $k => $v) {
                // pr($v);
                echo "<tr>";
                echo "<td>";
                echo ucwords(str_replace("_", " ", $k));
                echo "</td>";

                echo "<td>";
                echo $v;
                echo "</td>";

            }
        }
    }

# Now Close All the Previous Open Tags
    echo <<<EOD
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>
EOD;
}

function card_widget($title, $amount, $bgc = 1, $class = "card mb-4"){
    $background_color = array(
        1 => "bg-primary",
        2 => "bg-secondary",
        3 => "bg-tertiary",
        4 => "bg-quaternary",
    );
    $bgc = $background_color[$bgc];
    echo <<<EOD
    <section class="{$class}">
       <div class="card-body {$bgc}">
          <div class="widget-summary">
             <div class="widget-summary-col widget-summary-col-icon">
                <div class="summary-icon">
                   <i class="fas fa-life-ring"></i>
                </div>
             </div>
             <div class="widget-summary-col">
                <div class="summary">
                   <h4 class="title" style="">{$title}</h4>
                   <div class="info">
                      <strong class="amount">{$amount}</strong>
                   </div>
                </div>
                <div class="summary-footer">
                </div>
             </div>
          </div>
       </div>
    </section>
EOD;
 }

/**
 *
 * In Any select option replace
 * we will use it in Jquery 
 *
 */

 function from_arr_make_option_as_string($arr){
    $option_as_string = "<option value> --Select One-- </option>";
    if(is_array($arr)){
        foreach($arr as $k => $v){
            $option_as_string .= '<option value="' . $k . '">' . $v . '</option>';
        }
    }

    return $option_as_string;
 }

 global $country_array;

 $country_array = array(
    "AF" => "Afghanistan",
    "AL" => "Albania",
    "DZ" => "Algeria",
    "AS" => "American Samoa",
    "AD" => "Andorra",
    "AO" => "Angola",
    "AI" => "Anguilla",
    "AQ" => "Antarctica",
    "AG" => "Antigua and Barbuda",
    "AR" => "Argentina",
    "AM" => "Armenia",
    "AW" => "Aruba",
    "AU" => "Australia",
    "AT" => "Austria",
    "AZ" => "Azerbaijan",
    "BS" => "Bahamas",
    "BH" => "Bahrain",
    "BD" => "Bangladesh",
    "BB" => "Barbados",
    "BY" => "Belarus",
    "BE" => "Belgium",
    "BZ" => "Belize",
    "BJ" => "Benin",
    "BM" => "Bermuda",
    "BT" => "Bhutan",
    "BO" => "Bolivia",
    "BA" => "Bosnia and Herzegovina",
    "BW" => "Botswana",
    "BV" => "Bouvet Island",
    "BR" => "Brazil",
    "BQ" => "British Antarctic Territory",
    "IO" => "British Indian Ocean Territory",
    "VG" => "British Virgin Islands",
    "BN" => "Brunei",
    "BG" => "Bulgaria",
    "BF" => "Burkina Faso",
    "BI" => "Burundi",
    "KH" => "Cambodia",
    "CM" => "Cameroon",
    "CA" => "Canada",
    "CT" => "Canton and Enderbury Islands",
    "CV" => "Cape Verde",
    "KY" => "Cayman Islands",
    "CF" => "Central African Republic",
    "TD" => "Chad",
    "CL" => "Chile",
    "CN" => "China",
    "CX" => "Christmas Island",
    "CC" => "Cocos [Keeling] Islands",
    "CO" => "Colombia",
    "KM" => "Comoros",
    "CG" => "Congo - Brazzaville",
    "CD" => "Congo - Kinshasa",
    "CK" => "Cook Islands",
    "CR" => "Costa Rica",
    "HR" => "Croatia",
    "CU" => "Cuba",
    "CY" => "Cyprus",
    "CZ" => "Czech Republic",
    "CI" => "Côte d’Ivoire",
    "DK" => "Denmark",
    "DJ" => "Djibouti",
    "DM" => "Dominica",
    "DO" => "Dominican Republic",
    "NQ" => "Dronning Maud Land",
    "DD" => "East Germany",
    "EC" => "Ecuador",
    "EG" => "Egypt",
    "SV" => "El Salvador",
    "GQ" => "Equatorial Guinea",
    "ER" => "Eritrea",
    "EE" => "Estonia",
    "ET" => "Ethiopia",
    "FK" => "Falkland Islands",
    "FO" => "Faroe Islands",
    "FJ" => "Fiji",
    "FI" => "Finland",
    "FR" => "France",
    "GF" => "French Guiana",
    "PF" => "French Polynesia",
    "TF" => "French Southern Territories",
    "FQ" => "French Southern and Antarctic Territories",
    "GA" => "Gabon",
    "GM" => "Gambia",
    "GE" => "Georgia",
    "DE" => "Germany",
    "GH" => "Ghana",
    "GI" => "Gibraltar",
    "GR" => "Greece",
    "GL" => "Greenland",
    "GD" => "Grenada",
    "GP" => "Guadeloupe",
    "GU" => "Guam",
    "GT" => "Guatemala",
    "GG" => "Guernsey",
    "GN" => "Guinea",
    "GW" => "Guinea-Bissau",
    "GY" => "Guyana",
    "HT" => "Haiti",
    "HM" => "Heard Island and McDonald Islands",
    "HN" => "Honduras",
    "HK" => "Hong Kong SAR China",
    "HU" => "Hungary",
    "IS" => "Iceland",
    "IN" => "India",
    "ID" => "Indonesia",
    "IR" => "Iran",
    "IQ" => "Iraq",
    "IE" => "Ireland",
    "IM" => "Isle of Man",
    "IL" => "Israel",
    "IT" => "Italy",
    "JM" => "Jamaica",
    "JP" => "Japan",
    "JE" => "Jersey",
    "JT" => "Johnston Island",
    "JO" => "Jordan",
    "KZ" => "Kazakhstan",
    "KE" => "Kenya",
    "KI" => "Kiribati",
    "KW" => "Kuwait",
    "KG" => "Kyrgyzstan",
    "LA" => "Laos",
    "LV" => "Latvia",
    "LB" => "Lebanon",
    "LS" => "Lesotho",
    "LR" => "Liberia",
    "LY" => "Libya",
    "LI" => "Liechtenstein",
    "LT" => "Lithuania",
    "LU" => "Luxembourg",
    "MO" => "Macau SAR China",
    "MK" => "Macedonia",
    "MG" => "Madagascar",
    "MW" => "Malawi",
    "MY" => "Malaysia",
    "MV" => "Maldives",
    "ML" => "Mali",
    "MT" => "Malta",
    "MH" => "Marshall Islands",
    "MQ" => "Martinique",
    "MR" => "Mauritania",
    "MU" => "Mauritius",
    "YT" => "Mayotte",
    "FX" => "Metropolitan France",
    "MX" => "Mexico",
    "FM" => "Micronesia",
    "MI" => "Midway Islands",
    "MD" => "Moldova",
    "MC" => "Monaco",
    "MN" => "Mongolia",
    "ME" => "Montenegro",
    "MS" => "Montserrat",
    "MA" => "Morocco",
    "MZ" => "Mozambique",
    "MM" => "Myanmar [Burma]",
    "NA" => "Namibia",
    "NR" => "Nauru",
    "NP" => "Nepal",
    "NL" => "Netherlands",
    "AN" => "Netherlands Antilles",
    "NT" => "Neutral Zone",
    "NC" => "New Caledonia",
    "NZ" => "New Zealand",
    "NI" => "Nicaragua",
    "NE" => "Niger",
    "NG" => "Nigeria",
    "NU" => "Niue",
    "NF" => "Norfolk Island",
    "KP" => "North Korea",
    "VD" => "North Vietnam",
    "MP" => "Northern Mariana Islands",
    "NO" => "Norway",
    "OM" => "Oman",
    "PC" => "Pacific Islands Trust Territory",
    "PK" => "Pakistan",
    "PW" => "Palau",
    "PS" => "Palestinian Territories",
    "PA" => "Panama",
    "PZ" => "Panama Canal Zone",
    "PG" => "Papua New Guinea",
    "PY" => "Paraguay",
    "YD" => "People's Democratic Republic of Yemen",
    "PE" => "Peru",
    "PH" => "Philippines",
    "PN" => "Pitcairn Islands",
    "PL" => "Poland",
    "PT" => "Portugal",
    "PR" => "Puerto Rico",
    "QA" => "Qatar",
    "RO" => "Romania",
    "RU" => "Russia",
    "RW" => "Rwanda",
    "RE" => "Réunion",
    "BL" => "Saint Barthélemy",
    "SH" => "Saint Helena",
    "KN" => "Saint Kitts and Nevis",
    "LC" => "Saint Lucia",
    "MF" => "Saint Martin",
    "PM" => "Saint Pierre and Miquelon",
    "VC" => "Saint Vincent and the Grenadines",
    "WS" => "Samoa",
    "SM" => "San Marino",
    "SA" => "Saudi Arabia",
    "SN" => "Senegal",
    "RS" => "Serbia",
    "CS" => "Serbia and Montenegro",
    "SC" => "Seychelles",
    "SL" => "Sierra Leone",
    "SG" => "Singapore",
    "SK" => "Slovakia",
    "SI" => "Slovenia",
    "SB" => "Solomon Islands",
    "SO" => "Somalia",
    "ZA" => "South Africa",
    "GS" => "South Georgia and the South Sandwich Islands",
    "KR" => "South Korea",
    "ES" => "Spain",
    "LK" => "Sri Lanka",
    "SD" => "Sudan",
    "SR" => "Suriname",
    "SJ" => "Svalbard and Jan Mayen",
    "SZ" => "Swaziland",
    "SE" => "Sweden",
    "CH" => "Switzerland",
    "SY" => "Syria",
    "ST" => "São Tomé and Príncipe",
    "TW" => "Taiwan",
    "TJ" => "Tajikistan",
    "TZ" => "Tanzania",
    "TH" => "Thailand",
    "TL" => "Timor-Leste",
    "TG" => "Togo",
    "TK" => "Tokelau",
    "TO" => "Tonga",
    "TT" => "Trinidad and Tobago",
    "TN" => "Tunisia",
    "TR" => "Turkey",
    "TM" => "Turkmenistan",
    "TC" => "Turks and Caicos Islands",
    "TV" => "Tuvalu",
    "UM" => "U.S. Minor Outlying Islands",
    "PU" => "U.S. Miscellaneous Pacific Islands",
    "VI" => "U.S. Virgin Islands",
    "UG" => "Uganda",
    "UA" => "Ukraine",
    "SU" => "Union of Soviet Socialist Republics",
    "AE" => "United Arab Emirates",
    "GB" => "United Kingdom",
    "US" => "United States",
    "ZZ" => "Unknown or Invalid Region",
    "UY" => "Uruguay",
    "UZ" => "Uzbekistan",
    "VU" => "Vanuatu",
    "VA" => "Vatican City",
    "VE" => "Venezuela",
    "VN" => "Vietnam",
    "WK" => "Wake Island",
    "WF" => "Wallis and Futuna",
    "EH" => "Western Sahara",
    "YE" => "Yemen",
    "ZM" => "Zambia",
    "ZW" => "Zimbabwe",
    "AX" => "Åland Islands",
 );

global $country_full_array;

$country_full_array = array(
    "Afghanistan"=>"Afghanistan",
    "Aland Islands"=>"Aland Islands",
    "Albania"=>"Albania",
    "Algeria"=>"Algeria",
    "American Samoa"=>"American Samoa",
    "Andorra"=>"Andorra",
    "Angola"=>"Angola",
    "Anguilla"=>"Anguilla",
    "Antarctica"=>"Antarctica",
    "Antigua"=>"Antigua",
    "Argentina"=>"Argentina",
    "Armenia"=>"Armenia",
    "Aruba"=>"Aruba",
    "Australia"=>"Australia",
    "Austria"=>"Austria",
    "Azerbaijan"=>"Azerbaijan",
    "Bahamas"=>"Bahamas",
    "Bahrain"=>"Bahrain",
    "Bangladesh"=>"Bangladesh",
    "Barbados"=>"Barbados",
    "Barbuda"=>"Barbuda",
    "Belarus"=>"Belarus",
    "Belgium"=>"Belgium",
    "Belize"=>"Belize",
    "Benin"=>"Benin",
    "Bermuda"=>"Bermuda",
    "Bhutan"=>"Bhutan",
    "Bolivia"=>"Bolivia",
    "Bosnia"=>"Bosnia",
    "Botswana"=>"Botswana",
    "Bouvet Island"=>"Bouvet Island",
    "Brazil"=>"Brazil",
    "British Indian Ocean Trty."=>"British Indian Ocean Trty.",
    "Brunei Darussalam"=>"Brunei Darussalam",
    "Bulgaria"=>"Bulgaria",
    "Burkina Faso"=>"Burkina Faso",
    "Burundi"=>"Burundi",
    "Caicos Islands"=>"Caicos Islands",
    "Cambodia"=>"Cambodia",
    "Cameroon"=>"Cameroon",
    "Canada"=>"Canada",
    "Cape Verde"=>"Cape Verde",
    "Cayman Islands"=>"Cayman Islands",
    "Central African Republic"=>"Central African Republic",
    "Chad"=>"Chad",
    "Chile"=>"Chile",
    "China"=>"China",
    "Christmas Island"=>"Christmas Island",
    "Cocos (Keeling) Islands"=>"Cocos (Keeling) Islands",
    "Colombia"=>"Colombia",
    "Comoros"=>"Comoros",
    "Congo"=>"Congo",
    "Congo, Democratic Republic of the"=>"Congo, Democratic Republic of the",
    "Cook Islands"=>"Cook Islands",
    "Costa Rica"=>"Costa Rica",
    "Cote d Ivoire"=>"Cote d Ivoire",
    "Croatia"=>"Croatia",
    "Cuba"=>"Cuba",
    "Cyprus"=>"Cyprus",
    "Czech Republic"=>"Czech Republic",
    "Denmark"=>"Denmark",
    "Djibouti"=>"Djibouti",
    "Dominica"=>"Dominica",
    "Dominican Republic"=>"Dominican Republic",
    "Ecuador"=>"Ecuador",
    "Egypt"=>"Egypt",
    "El Salvador"=>"El Salvador",
    "Equatorial Guinea"=>"Equatorial Guinea",
    "Eritrea"=>"Eritrea",
    "Estonia"=>"Estonia",
    "Ethiopia"=>"Ethiopia",
    "Falkland Islands (Malvinas)"=>"Falkland Islands (Malvinas)",
    "Faroe Islands"=>"Faroe Islands",
    "Fiji"=>"Fiji",
    "Finland"=>"Finland",
    "France"=>"France",
    "French Guiana"=>"French Guiana",
    "French Polynesia"=>"French Polynesia",
    "French Southern Territories"=>"French Southern Territories",
    "Futuna Islands"=>"Futuna Islands",
    "Gabon"=>"Gabon",
    "Gambia"=>"Gambia",
    "Georgia"=>"Georgia",
    "Germany"=>"Germany",
    "Ghana"=>"Ghana",
    "Gibraltar"=>"Gibraltar",
    "Greece"=>"Greece",
    "Greenland"=>"Greenland",
    "Grenada"=>"Grenada",
    "Guadeloupe"=>"Guadeloupe",
    "Guam"=>"Guam",
    "Guatemala"=>"Guatemala",
    "Guernsey"=>"Guernsey",
    "Guinea"=>"Guinea",
    "Guinea-Bissau"=>"Guinea-Bissau",
    "Guyana"=>"Guyana",
    "Haiti"=>"Haiti",
    "Heard"=>"Heard",
    "Herzegovina"=>"Herzegovina",
    "Holy See"=>"Holy See",
    "Honduras"=>"Honduras",
    "Hong Kong"=>"Hong Kong",
    "Hungary"=>"Hungary",
    "Iceland"=>"Iceland",
    "India"=>"India",
    "Indonesia"=>"Indonesia",
    "Iran (Islamic Republic of)"=>"Iran (Islamic Republic of)",
    "Iraq"=>"Iraq",
    "Ireland"=>"Ireland",
    "Isle of Man"=>"Isle of Man",
    "Israel"=>"Israel",
    "Italy"=>"Italy",
    "Jamaica"=>"Jamaica",
    "Jan Mayen Islands"=>"Jan Mayen Islands",
    "Japan"=>"Japan",
    "Jersey"=>"Jersey",
    "Jordan"=>"Jordan",
    "Kazakhstan"=>"Kazakhstan",
    "Kenya"=>"Kenya",
    "Kiribati"=>"Kiribati",
    "Korea"=>"Korea",
    "Korea (Democratic)"=>"Korea (Democratic)",
    "Kuwait"=>"Kuwait",
    "Kyrgyzstan"=>"Kyrgyzstan",
    "Lao"=>"Lao",
    "Latvia"=>"Latvia",
    "Lebanon"=>"Lebanon",
    "Lesotho"=>"Lesotho",
    "Liberia"=>"Liberia",
    "Libyan Arab Jamahiriya"=>"Libyan Arab Jamahiriya",
    "Liechtenstein"=>"Liechtenstein",
    "Lithuania"=>"Lithuania",
    "Luxembourg"=>"Luxembourg",
    "Macao"=>"Macao",
    "Macedonia"=>"Macedonia",
    "Madagascar"=>"Madagascar",
    "Malawi"=>"Malawi",
    "Malaysia"=>"Malaysia",
    "Maldives"=>"Maldives",
    "Mali"=>"Mali",
    "Malta"=>"Malta",
    "Marshall Islands"=>"Marshall Islands",
    "Martinique"=>"Martinique",
    "Mauritania"=>"Mauritania",
    "Mauritius"=>"Mauritius",
    "Mayotte"=>"Mayotte",
    "McDonald Islands"=>"McDonald Islands",
    "Mexico"=>"Mexico",
    "Micronesia"=>"Micronesia",
    "Miquelon"=>"Miquelon",
    "Moldova"=>"Moldova",
    "Monaco"=>"Monaco",
    "Mongolia"=>"Mongolia",
    "Montenegro"=>"Montenegro",
    "Montserrat"=>"Montserrat",
    "Morocco"=>"Morocco",
    "Mozambique"=>"Mozambique",
    "Myanmar"=>"Myanmar",
    "Namibia"=>"Namibia",
    "Nauru"=>"Nauru",
    "Nepal"=>"Nepal",
    "Netherlands"=>"Netherlands",
    "Netherlands Antilles"=>"Netherlands Antilles",
    "Nevis"=>"Nevis",
    "New Caledonia"=>"New Caledonia",
    "New Zealand"=>"New Zealand",
    "Nicaragua"=>"Nicaragua",
    "Niger"=>"Niger",
    "Nigeria"=>"Nigeria",
    "Niue"=>"Niue",
    "Norfolk Island"=>"Norfolk Island",
    "Northern Mariana Islands"=>"Northern Mariana Islands",
    "Norway"=>"Norway",
    "Oman"=>"Oman",
    "Pakistan"=>"Pakistan",
    "Palau"=>"Palau",
    "Palestinian Territory, Occupied"=>"Palestinian Territory, Occupied",
    "Panama"=>"Panama",
    "Papua New Guinea"=>"Papua New Guinea",
    "Paraguay"=>"Paraguay",
    "Peru"=>"Peru",
    "Philippines"=>"Philippines",
    "Pitcairn"=>"Pitcairn",
    "Poland"=>"Poland",
    "Portugal"=>"Portugal",
    "Principe"=>"Principe",
    "Puerto Rico"=>"Puerto Rico",
    "Qatar"=>"Qatar",
    "Reunion"=>"Reunion",
    "Romania"=>"Romania",
    "Russian Federation"=>"Russian Federation",
    "Rwanda"=>"Rwanda",
    "Saint Barthelemy"=>"Saint Barthelemy",
    "Saint Helena"=>"Saint Helena",
    "Saint Kitts"=>"Saint Kitts",
    "Saint Lucia"=>"Saint Lucia",
    "Saint Martin (French part)"=>"Saint Martin (French part)",
    "Saint Pierre"=>"Saint Pierre",
    "Saint Vincent"=>"Saint Vincent",
    "Samoa"=>"Samoa",
    "San Marino"=>"San Marino",
    "Sao Tome"=>"Sao Tome",
    "Saudi Arabia"=>"Saudi Arabia",
    "Senegal"=>"Senegal",
    "Serbia"=>"Serbia",
    "Seychelles"=>"Seychelles",
    "Sierra Leone"=>"Sierra Leone",
    "Singapore"=>"Singapore",
    "Slovakia"=>"Slovakia",
    "Slovenia"=>"Slovenia",
    "Solomon Islands"=>"Solomon Islands",
    "Somalia"=>"Somalia",
    "South Africa"=>"South Africa",
    "South Georgia"=>"South Georgia",
    "South Sandwich Islands"=>"South Sandwich Islands",
    "Spain"=>"Spain",
    "Sri Lanka"=>"Sri Lanka",
    "Sudan"=>"Sudan",
    "Suriname"=>"Suriname",
    "Svalbard"=>"Svalbard",
    "Swaziland"=>"Swaziland",
    "Sweden"=>"Sweden",
    "Switzerland"=>"Switzerland",
    "Syrian Arab Republic"=>"Syrian Arab Republic",
    "Taiwan"=>"Taiwan",
    "Tajikistan"=>"Tajikistan",
    "Tanzania"=>"Tanzania",
    "Thailand"=>"Thailand",
    "The Grenadines"=>"The Grenadines",
    "Timor-Leste"=>"Timor-Leste",
    "Tobago"=>"Tobago",
    "Togo"=>"Togo",
    "Tokelau"=>"Tokelau",
    "Tonga"=>"Tonga",
    "Trinidad"=>"Trinidad",
    "Tunisia"=>"Tunisia",
    "Turkey"=>"Turkey",
    "Turkmenistan"=>"Turkmenistan",
    "Turks Islands"=>"Turks Islands",
    "Tuvalu"=>"Tuvalu",
    "Uganda"=>"Uganda",
    "Ukraine"=>"Ukraine",
    "United Arab Emirates"=>"United Arab Emirates",
    "United Kingdom"=>"United Kingdom",
    "United States"=>"United States",
    "Uruguay"=>"Uruguay",
    "US Minor Outlying Islands"=>"US Minor Outlying Islands",
    "Uzbekistan"=>"Uzbekistan",
    "Vanuatu"=>"Vanuatu",
    "Vatican City State"=>"Vatican City State",
    "Venezuela"=>"Venezuela",
    "Vietnam"=>"Vietnam",
    "Virgin Islands (British)"=>"Virgin Islands (British)",
    "Virgin Islands (US)"=>"Virgin Islands (US)",
    "Wallis"=>"Wallis",
    "Western Sahara"=>"Western Sahara",
    "Yemen"=>"Yemen",
    "Zambia"=>"Zambia",
    "Zimbabwe"=>"Zimbabwe",
);

global $status_array;

$status_array = array(
    1 => "Active",
    0 => "DeActive",
);


global $saudi_states_ar;

$saudi_states_ar = array(
    "الرياض"            => "الرياض",
    "مكة المكرمة"       => "مكة المكرمة",
    "المدينة المنورة"   => "المدينة المنورة",
    "القصيم"            => "القصيم",
    "الشرقية"           => "الشرقية",
    "عسير"              => "عسير",
    "تبوك"              => "تبوك",
    "حائل"              => "حائل",
    "الحدود الشمالية"   => "الحدود الشمالية",
    "جازان"             => "جازان",
    "نجران"             => "نجران",
    "الباحة"            => "الباحة",
    "الجوف"             => "الجوف",
);

global $saudi_states;

$saudi_states = array(
    "Riyadh"                => "Riyadh",
    "Makkah"                => "Makkah",
    "Madinah"               => "Madinah",
    "Qassim"                => "Qassim",
    "Eastern"               => "Eastern",
    "Asir"                  => "Asir",
    "Tabuk"                 => "Tabuk",
    "Hail"                  => "Hail",
    "The Northern Border"   => "The Northern Border",
    "Jazan"                 => "Jazan",
    "Najran"                => "Najran",
    "Al Baha"               => "Al Baha",
    "Al Jouf"               => "Al Jouf",
);

global $order_type;

$order_type = array(
    "Broker" => "Broker",
    "Import" => "Import",
    "Auto Parts" => "Auto Parts",
);

global $shipping_type;

$shipping_type = array(
    "Local" => "Local",
    "Global" => "Global",
);

global $amount_type;

$amount_type = array(
    "Fixed" => "Fixed",
    "Percentage" => "Percentage",
);

global $service_type;

$service_type = array(
    
    "Fixed" => "Fixed",
    "Range" => "Range",
);

global $service_for;

$service_for = array(

    "Image" => "Image",
    "Video" => "Video",
);

global $wallet_status;

$wallet_status = array(

    "Available"     => "Available",
    "Required"      => "Required",
    "Pending"       => "Pending",
    "Receivable"    => "Receivable",
    "Withdraw"      => "Withdraw",
    "Points"        => "Points",
    "Used"          => "Used",
);