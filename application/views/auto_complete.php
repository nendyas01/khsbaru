<?php
defined('BASEPATH') or exit('No direct script access allowed');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Auto complete</title>

    <style type="text/css">

    </style>
    <!-- <link rel='stylesheet' href='<?php echo base_url() . 'assets/build/bootstrap-less/bootstrap.less' ?>'> -->
</head>

<body>

    <div class="container">
        <div class='row'>
            <h2>Autocomplete live search</h2>
        </div>


        <div class='row'>
            <form>
                <div class='form_group'>
                    <label>No SPJ : </label>
                    <input type="text" class='form_control' id='nomorspj' stylesheet='width:500px'>
                </div>
            </form>
        </div>
    </div>

    <script type='text/javascript' src='<?php echo base_url() . 'assets/js/query-1.10.2.js' ?>'></script>
    <script type='text/javascript' src='<?php echo base_url() . 'assets/js/bootstrap.min.js' ?>'></script>
    <script type='text/javascript' src='<?php echo base_url() . 'assets/js/jquery-ui.min.js' ?>'></script>
    <script type='text/javascript'>
        $(document).ready(function() {
            $('#nomorspj').autocomplete({
                source: "<?php echo site_url('auto_complete/get_autocomplete/?') ?>"
            })
        });
    </script>
</body>

</html>