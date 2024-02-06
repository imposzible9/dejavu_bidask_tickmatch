<?php
$page_title = 'Tick Match';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tick Match</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!---datatael---->
    <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/fixedcolumns/3.2.2/css/fixedColumns.bootstrap.min.css" rel="stylesheet"> 
    <!-- Include Bootstrap CSS and Bootstrap Icons -->
    <!---ปิดdatatael---->
    <style>
        a {
            text-decoration: none;
        }

        .login-page {
            width: 100%;
            height: 100%;
            align-items: center;
        }

        .form-right i {
            font-size: 100px;
        }

        #loadMe .modal-content {
            background-color: inherit !important;
            border: none !important;
            outline: none !important;
            box-shadow: none !important;
        }
    </style>
</head>

<body>

    <div class="login-page bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12"><br>
                    <center>
                        <h2>
                            <p style="color:#1B7FD6">Tick Match</p>
                        </h2>
                        <hr width="10%" style="color:#1B7FD6">
                    </center>
                    <div class="bg-white shadow rounded">
                        <div class="row">
                            <div class="col-md-6 pe-0">
                                <div class="form-left h-100 py-5 px-5">
                                    <form name="frmCut" id="frmCut" action="/api/v1/analyze" method="post" class="row g-4">
                                        <div class="col-4">
                                            <div class="input-group">
                                                <input type="text" name="symbol1" id="symbol1" class="form-control" placeholder="symbol" require>
                                            </div>
                                        </div>
                                        <?php
                                        $date = strtotime(date('Y-m-d'));
                                        $date = strtotime("-1 day", $date);

                                        ?>
                                        <div class="col-5">
                                            <div class="input-group">
                                                <input type="date" name="datest1" id="checkInDate" class="form-control" value="<?php echo date('Y-m-d', $date); ?>" max="<?php echo date('Y-m-d', $date); ?>">
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="input-group">
                                                <button type="submit" id="f1" name="f1" class="btn btn-primary">search</button>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="input-group">
                                                <label style="font-size: 15px; color: red;">*ไม่สามารถดึงแสดงวันที่ปัจจุบันได้<span class="text-danger">
                                            </div>

                                        </div>
                                    </form>
                                    <!----------------------datatabel-------------------->
                                    <table id="dataTable" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Time</th>
                                                <th>Last</th>
                                                <th>Vol</th>
                                                <th>Type</th>
                                            </tr>
                                        </thead>
                                        <tbody class="queryEmp">

                                        </tbody>
                                    </table>

                                    <!-- =================================================================ปิด datatabel=================---------------------------------------->
                                </div>
                            </div>
                            <div class="col-md-6 pe-0">
                                <div class="form-left h-100 py-5 px-5">
                                    <form name="frmCut1" id="frmCut1" action="/api/v1/analyze1" method="POST" class="row g-4">
                                        <div class="col-4">
                                            <div class="input-group">
                                                <input type="text" name="symbol2" id="symbol2" class="form-control" placeholder="symbol" require>
                                            </div>
                                        </div>

                                        <div class="col-5">
                                            <div class="input-group">
                                                <input type="date" name="datest2" id="checkOutDate" class="form-control" value="<?php echo date('Y-m-d', $date); ?>" max="<?php echo date('Y-m-d', $date); ?>">
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="input-group">
                                                <button type="submit" id="f2" name="f2" class="btn btn-primary">search</button>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="input-group">
                                                <label style="font-size: 15px; color: red;">*ไม่สามารถดึงแสดงวันที่ปัจจุบันได้<span class="text-danger">
                                            </div>

                                        </div>

                                    </form>
                                    <table id="dataTable1" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Time</th>
                                                <th>Last</th>
                                                <th>Vol</th>
                                                <th>Type</th>
                                            </tr>
                                        </thead>
                                        <tbody class="queryEmp1">

                                        </tbody>
                                    </table>
                                    <!-- =================================================================ปิด datatabel=================---------------------------------------->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once('tickmatch.modal.php') ?>
    </div>
</body>

<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/fixedcolumns/3.2.2/js/dataTables.fixedColumns.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</html>

<script>
    $(document).ready(function() {
       
        $(document).prop('title', '<?php echo $page_title; ?>');
        $('#dataTable').DataTable({
            bServerSide: false,
            bProcessing: false,
            bRetrieve: false,
            sPagingType: 'simple',
            pageLength: 5,
            sDom: 'brtp',
            paging: true,
            bRetrieve: false,
            bSearching: false,
            bSearchable: false,
            bLengthChange: false,
            bSort: false,
        });
    });
    $(document).ready(function() {
        $('#dataTable1').DataTable({
            bServerSide: false,
            bProcessing: false,
            bRetrieve: false,
            sPagingType: 'simple',
            pageLength: 5,
            sDom: 'brtp',
            paging: true,
            bRetrieve: false,
            bSearching: false,
            bSearchable: false,
            bLengthChange: false,
            bSort: false,
        });
    });


    $(document).ready(function() {
        $("#frmCut").on("submit", function(event) {
            event.preventDefault();

            var formValues = $(this).serialize();
            console.log(formValues);
            var actionUrl = $(this).attr("action");
            $("#loadMe").modal("show");
            $.post(actionUrl, formValues, function(data) {
                // Display the returned data in browser
                $('.queryEmp').html(data);
                $("#result").html(data);
                $("#loadMe").modal("hide");
               
            });
        });
    });
    $(document).ready(function() {
        $("#frmCut1").on("submit", function(event) {
            event.preventDefault();

            var formValues = $(this).serialize();
            console.log(formValues);
            var actionUrl = $(this).attr("action");
            $("#loadMe").modal("show");
            $.post(actionUrl, formValues, function(data) {
                // Display the returned data in browser
                $('.queryEmp1').html(data);
                $("#result1").html(data);
                $("#loadMe").modal("hide");               
            });
        });
    });


    $('#checkInDate').change(function() {
        var date = this.valueAsDate;
        date.setDate(date.getDate());
        $('#checkOutDate')[0].valueAsDate = date;
    });

    $('#checkInDate').change();
</script>