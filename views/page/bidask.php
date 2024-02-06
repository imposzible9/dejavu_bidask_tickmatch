<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<style>
    @import url('https://fonts.googleapis.com/css?family=Roboto:400,500,700,900&display=swap');

    body {
        font-family: 'Roboto', sans-serif;
    }

    h2 {
        font-family: SemiBold;
    }

    .form-control {
        background: #ecf0f4;
    }

    .form-control:focus {
        border-color: #00bcd9;
        -webkit-box-shadow: 0px 0px 20px rgba(0, 0, 0, .1);
        -moz-box-shadow: 0px 0px 20px rgba(0, 0, 0, .1);
        box-shadow: 0px 0px 20px rgba(0, 0, 0, .1);
    }

    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }

    .table td,
    .table th {
        padding: 12px 15px;
        border: 0px solid #B6DBFB;
        text-align: center;
        font-size: 16px;

    }

    #loadMe .modal-content {
        background-color: inherit !important;
        border: none !important;
        outline: none !important;
        box-shadow: none !important;
    }
</style>

<?php
function isWeekend($date)
{
    $weekDay = date('w', strtotime($date));
    return ($weekDay == 0 || $weekDay == 6);
}
$page_title = 'BID-ASK';
$default_search_day = isWeekend(date("Y-m-d", strtotime("-1 days"))) == 1 ? date("Y-m-d", strtotime("-3 days")) : date("Y-m-d", strtotime("-1 days"));

?>

<div class="content-wrapper1 bg-light">
    <div class="content-header">
        <div class="container-fluid">

            <div class=" d-flex justify-content-center">
                <div class="card col-9">
                    <div class="container">
                        <div class="form-wrap">
                            <h2>
                                <center>
                                    <p style="color:#1B7FD6">BID-ASK</p>
                                </center>
                            </h2>
                            <!-- <hr width="20%" style="color:#F2F2F2"> -->

                            <!-- <div class="card card">
                                <div class="card-header">
                                    <button class="btn btn-sm btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">X</button>
                                </div>
                            </div> -->



                            <div class="card">

                                <form action="" method="post" id="survey-form">



                                    <div class="card-body">


                                        <div class="row">
                                            <div class="col-12 d-flex justify-content-center">
                                                <div class="row col-md-8">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label id="email-label" for="stDate" class="col-form-label-sm px-0 col-12 text-white">.</label>
                                                            <div class="col-12 p-0">
                                                                <input type="text" value="" name="symbol" id="symbol" placeholder="Symbol" class="form-control form-control-sm col-md-12" required>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label id="email-label" for="stDate" class="col-form-label-sm px-0 col-12">Start Date :</label>
                                                            <div class="col-12 p-0">
                                                                <input type="date" name="stDate" id="stDate" value="<?php echo $default_search_day; ?>" class="form-control form-control-sm" max=<?php echo $default_search_day; ?> required>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label id="email-label" for="enDate" class="col-form-label-sm px-0 col-12">End Date :</label>
                                                            <div class="col-12 p-0">
                                                                <input type="date" name="enDate" id="enDate" value="<?php echo $default_search_day; ?>" class="form-control form-control-sm" max=<?php echo $default_search_day; ?> required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row d-flex justify-content-center ">
                                            <div class="col-3 d-flex justify-content-center">
                                                <small class="w-100 text-danger col-12" style="font-size: 0.7rem;">* ไม่สามารถค้นหาวันที่ปัจจุบันได้</small>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 d-flex justify-content-center">
                                                <div class="row col-md-8">
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label id="name-label" for="sttime" class="col-form-label-sm px-0 col-12">Start Time :</label>
                                                            <div class="col-12 p-0">
                                                                <input type="time" name="sttime" id="sttime" value="10:00" class="form-control form-control-sm" min="10:00" max="16:30" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label id="email-label" for="entime" class="col-form-label-sm px-0 col-12">End Time :</label>
                                                            <div class="col-12 p-0">
                                                                <input type="time" name="entime" id="entime" value="16:30" class="form-control form-control-sm" min="10:00" max="16:30" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4 row">
                                                        <div class="col-5">
                                                            <div class="form-group row">
                                                                <label id="email-label" for="entime" class="col-form-label-sm col-12 px-0 text-white">.</label>
                                                                <div class="col-12 p-0">
                                                                    <input type="number" value="" name="speed" id="speed" placeholder="Speed" class="form-control form-control-sm col-12" min="1" max="100">

                                                                </div>
                                                            </div>
                                                        </div>
                                                        &nbsp;&nbsp;
                                                        <div class="col-6">
                                                            <div class="form-group row">
                                                                <label id="email-label" for="entime" class="col-form-label-sm col-12 px-0 text-white">.</label>
                                                                <button type="submit" name="submit" id="submit" class="btn btn-sm btn-primary btn-block col-12">Search</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- <div class="row">
                                            <div class="col-4">
                                                <div class="form-group row d-flex justify-content-center">
                                                    <label id="email-label" for="stDate" class="col-form-label-sm px-0 col-12 text-white">.</label>
                                                    <input type="text" value="" name="symbol" id="symbol" placeholder="Symbol" class="form-control form-control-sm col-5" required>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="row">
                                                    <div class="form-group col-6">
                                                        <label id="email-label" for="stDate" class="col-form-label-sm px-0 col-12">Start Date :</label>
                                                        <div class="col-12 p-0">
                                                            <input type="date" name="stDate" id="stDate" value="<?php echo $default_search_day; ?>" class="form-control form-control-sm" max=<?php echo $default_search_day; ?> required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-6">
                                                        <label id="email-label" for="enDate" class="col-form-label-sm px-0 col-12">End Date :</label>
                                                        <div class="col-12 p-0">
                                                            <input type="date" name="enDate" id="enDate" value="<?php echo $default_search_day; ?>" class="form-control form-control-sm" max=<?php echo $default_search_day; ?> required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <small class="w-100 text-danger col-12" style="font-size: 0.7rem;">* ไม่สามารถค้นหาวันที่ปัจจุบันได้</small>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="row">
                                                    <div class="form-group col-6">
                                                        <label id="name-label" for="sttime" class="col-form-label-sm px-0 col-12">Start Time :</label>
                                                        <div class="col-12 p-0">
                                                            <input type="time" name="sttime" id="sttime" value="10:00" class="form-control form-control-sm" min="10:00" max="16:30" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-6">
                                                        <label id="email-label" for="entime" class="col-form-label-sm px-0 col-12">End Time :</label>
                                                        <div class="col-12 p-0">
                                                            <input type="time" name="entime" id="entime" value="16:30" class="form-control form-control-sm" min="10:00" max="16:30" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div> -->

                                        <div class="row d-flex justify-content-center">
                                            <div class="col-8 mt-3">
                                                <div class="row d-flex justify-content-center">
                                                    <div class="form-group">
                                                        <h1 id="css_time_run" class="">00:00:00</h1>
                                                    </div>

                                                </div>
                                            </div>

                                            <!-- <div class="col-4">
                                                <div class="row">
                                                    <div class="form-group col-6 d-flex justify-content-end">
                                                        <label id="email-label" for="entime" class="col-form-label-sm col-3 px-0"></label>
                                                        <input type="number" value="" name="speed" id="speed" placeholder="Speed" class="form-control form-control-sm col-8" min="1" max="100">
                                                    </div>
                                                    <div class="form-group col-6 d-flex justify-content-end">
                                                        <label id="email-label" for="entime" class="col-form-label-sm col-3 px-0"></label>
                                                        <button type="submit" name="submit" id="submit" class="btn btn-sm btn-primary btn-block col-8">Search</button>
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>



                                    </div>

                                </form>

                                <div class="row  d-flex justify-content-center">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <!-- <div class="card-header">
                                                <h3 class="card-title">Fixed Header Table</h3>
                                                <div class="card-tools">
                                                    <div class="input-group input-group-sm" style="width: 150px;">
                                                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                                        <div class="input-group-append">
                                                            <button type="submit" class="btn btn-default">
                                                                <i class="fas fa-search"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->

                                            <style>
                                                .table-custom-style th {
                                                    font-size: 0.925rem !important;
                                                    color: #1B7FD6;
                                                    padding: .5rem !important;
                                                    background-color: #B6DBFB;
                                                    text-align: center;
                                                }

                                                .table-custom-style td {
                                                    /* padding: .25rem .5rem; */
                                                    padding: .25rem !important;
                                                    height: calc(1.5em + .5rem + 2px);
                                                    font-size: .875rem;
                                                    line-height: 1.5;

                                                }

                                                .form-control {
                                                    background: #ecf0f4;
                                                    border-color: transparent;
                                                    -webkit-transition: all 0.3s ease-in-out;
                                                    -moz-transition: all 0.3s ease-in-out;
                                                    -o-transition: all 0.3s ease-in-out;
                                                    transition: all 0.3s ease-in-out;
                                                }

                                                .form-control:focus {
                                                    border-color: #00bcd9;
                                                    -webkit-box-shadow: 0px 0px 20px rgba(0, 0, 0, .1);
                                                    -moz-box-shadow: 0px 0px 20px rgba(0, 0, 0, .1);
                                                    box-shadow: 0px 0px 20px rgba(0, 0, 0, .1);
                                                }

                                                textarea.form-control {
                                                    height: 160px;
                                                    padding-top: 15px;
                                                    resize: none;
                                                }

                                                .btn-primary:not(:disabled):not(.disabled):active,
                                                .btn-primary:not(:disabled):not(.disabled).active,
                                                .show>.btn-primary.dropdown-toggle {
                                                    color: #00bcd9;
                                                    background-color: #ffffff;
                                                    border-color: #00bcd9;
                                                }

                                                .btn-primary:not(:disabled):not(.disabled):active:focus,
                                                .btn-primary:not(:disabled):not(.disabled).active:focus,
                                                .show>.btn-primary.dropdown-toggle:focus {
                                                    -webkit-box-shadow: 0px 0px 20px rgba(0, 0, 0, .1);
                                                    -moz-box-shadow: 0px 0px 20px rgba(0, 0, 0, .1);
                                                    box-shadow: 0px 0px 20px rgba(0, 0, 0, .1);
                                                }
                                            </style>

                                            <div class="card-body table-responsive p-0">
                                                <table class="table table-striped table-sm text-nowrap table-custom-style">
                                                    <thead>
                                                        <tr>
                                                            <th>Vol BID</th>
                                                            <th>BID</th>
                                                            <th>ASK</th>
                                                            <th>Vol ASK</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="bidask-body">
                                                        <?php for ($i = 0; $i < 10; $i++) { ?>
                                                            <tr>
                                                                <td>0</td>
                                                                <td>0</td>
                                                                <td>0</td>
                                                                <td>0</td>
                                                            </tr>
                                                        <?php } ?>
                                                        <tr>
                                                            <td colspan="4"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Sum Bid</th>
                                                            <th></th>
                                                            <th></th>
                                                            <th>Sum Ask</th>
                                                        </tr>
                                                        <tr>
                                                            <td>0</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>0</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input type="range" class="w-100 form-control-range" id="SnapData" min="1" max="1" value="1">
                                            <div class=" d-flex justify-content-center">
                                                <button id="toggleCarousel" class="btn btn-sm btn-default"><i class="fa fa-play"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-8">
                                        <div class="table-responsive p-0">
                                            <h6>In Range</h6>
                                            <table class="table table-sm text-nowrap table-custom-style">
                                                <thead>
                                                    <tr>
                                                        <th>OPEN</th>
                                                        <th>HIGH</th>
                                                        <th>LOW</th>
                                                        <th>CLOSE</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="open-close-body">
                                                    <tr>
                                                        <td>0</td>
                                                        <td>0</td>
                                                        <td>0</td>
                                                        <td>0</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-8">
                                        <div class="table-responsive p-0">
                                            <h6>Actual</h6>
                                            <table class="table table-sm text-nowrap table-custom-style">
                                                <thead>
                                                    <tr>
                                                        <th>OPEN</th>
                                                        <th>HIGH</th>
                                                        <th>LOW</th>
                                                        <th>CLOSE</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="open-close-actual-body">
                                                    <tr>
                                                        <td>0</td>
                                                        <td>0</td>
                                                        <td>0</td>
                                                        <td>0</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
















                            </div>




                        </div>
                    </div>
                </div>
            </div>




        </div>
    </div>


    <?php require_once('bidask.modal.php') ?>
</div>

<script>
    let count_down;
    let log = console.log;

    let startTime, endTime;

    let delay = 3000;
    let OldSpeed = 1;
    let Speed = 1;

    let count_records_bidask = 0


    let new_bidask2compare = [];
    let old_bidask2compare = [];


    let paused = 0;
    let playing = 0;

    $(document).ready(function() {
        //$("#loadMe").modal("show");
        $(document).prop('title', '<?php echo $page_title; ?>');
        $('#SnapData').on('input', function() {
            let value = $(this).val();
            //log(value)
            let res = result_bidask[value - 1];
            log(value, res, paused)
            count_records_bidask = value - 1;
            new_bidask2compare = [];
            old_bidask2compare = [];
            if (paused) {
                startInterval(submitFormSetVals(onetime = 1));
                //stopInterval();
            }
        });

        $('#toggleCarousel').click(function() {
            var state = (paused) ? 'cycle' : 'pause';
            paused = (paused) ? 0 : 1;

            if (playing) {
                $(this).find('i').toggleClass('fa-play fa-pause');
                paused == 0 ? startInterval(submitFormSetVals) : stopInterval();
            }

        });

        $('#SnapData').on('keydown', function(e) {
            //     if (e.which === 38 || e.which === 39) {
            //         // Increase the value of the range input
            //         var currentValue = parseInt($(this).val());
            //         $(this).val(currentValue + 1);

            //         // Prevent the default behavior of arrow key events
            //         e.preventDefault();
            //     }
        });
        $('#myRange').on('input', function(e) {
            //log(e)
            // $(this).on('keydown', function(e) {
            //     if (e.which === 38 || e.which === 39) {
            //         // Increase the value of the range input
            //         var currentValue = parseInt($(this).val());
            //         $(this).val(currentValue + 1);
            //     } else if (e.which === 37 || e.which === 40) {
            //         // Decrease the value of the range input
            //         var currentValue = parseInt($(this).val());
            //         $(this).val(currentValue - 1);
            //     }
            // });
        });

        $('#speed').on('keypress', function(e) {
            if (e.which == 13) {
                e.preventDefault();
            }
        });
        $('#survey-form').on('submit', function(e) {
            log($(this))
            e.preventDefault();

            var $inputs = $('#survey-form :input');
            var values = {};
            $inputs.each(function() {
                values[this.name] = $(this).val();
            });
            log(values);

            let opts = {}
            opts.url = '/api/v1/querybidask'
            opts.values = values
            opts.method = 'POST'
            opts.cb_beforeSend = function() {

                sttime = $('#sttime').val();
                entime = $('#entime').val();
                comp2val(sttime, entime);

                $("#loadMe").modal("show");
                $('#toggleCarousel').find('i').addClass('fa-pause');
                $('#toggleCarousel').find('i').removeClass('fa-play');
                // if (!paused) {

                // } else {
                //     $('#toggleCarousel').find('i').removeClass('fa-pause');
                //     $('#toggleCarousel').find('i').addClass('fa-play');
                // }
                stopInterval();
                //$("#css_time_run").html("");

                sttime = $('#stDate').val() + " " + $('#sttime').val();
                entime = $('#enDate').val() + " " + $('#entime').val();
            }
            opts.cb_success = function(data) {
                log(data);
                log(data.bidask.length);

                $('#SnapData').attr('max', data.bidask.length)
                result_bidask = data.bidask;
                result_tickmatch = data.tickmatch;
                if (result_bidask.length == 0 && result_tickmatch.length == 0) {
                    //alert();
                }
            }
            opts.cb_done = function() {
                window.setTimeout(function() {
                    $('#loadMe').modal('hide');
                    count_records_bidask = 0
                    new_bidask2compare = []
                    old_bidask2compare = []
                    //submitFormSetVals();
                    //delay = $('#Speed').val() != undefined ? $('#Speed').val() : 1;
                    //Speed = $('#Speed').val() != undefined ? $('#Speed').val() : 1;
                    OldSpeed = $('#Speed').val() != undefined ? $('#Speed').val() : 1;
                    //log(OldSpeed, Speed)
                    startInterval(submitFormSetVals);
                    playing = 1;
                }, 2000)
            }


            let opts2 = {}
            opts2.url = '/api/v1/checksymbol'
            opts2.values = values
            opts2.method = 'POST'
            opts2.cb_success = function(data) {
                if (data.status == 'error') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: data.info,
                        timer: 1500,
                        showCancelButton: false,
                        showConfirmButton: false
                    });
                } else {
                    FetchData(opts)
                }
            }
            FetchData(opts2)






        });

        function FetchData(options = {
            url: '',
            method: 'GET',
            values: {},
            cb_beforeSend: null,
            cb_success: null,
            cb_error: null,
            cb_done: null
        }) {
            /*
                $.ajax({
                    url: options.url,
                    type: options.method, //"POST",
                    data: options.values,
                    dataType: "json",
                    //contentType: false,
                    //cache: false,
                    //processData: false,
                    beforeSend: function() {
                        sttime = $('#sttime').val();
                        entime = $('#entime').val();
                        comp2val(sttime, entime);

                        $("#loadMe").modal("show");
                        clearInterval(count_down);
                        $("#css_time_run").html("");

                        sttime = $('#stDate').val() + " " + $('#sttime').val();
                        entime = $('#enDate').val() + " " + $('#entime').val();
                        //log(sttime, entime);
                    },
                    success: function(data) {
                    
                        log(data);
                        result_bidask = data.data;
                        result_tickmatch = data.row_tickmatch;
                        if (result_bidask.length == 0 && result_tickmatch.length == 0) {
                            //alert();
                        }

                    },
                    error: function(e) {
                        //$("#err").html(e).fadeIn();
                    },

                }).done(function() {
                    window.setTimeout(function() {
                        $('#loadMe').modal('hide');
                        count_records_bidask = 0
                        new_bidask2compare = []
                        old_bidask2compare = []
                        submitFormSetVals();
                    }, 2000);
                });
            */
            $.ajax({
                url: options.url,
                type: options.method,
                data: options.values,
                dataType: "json",
                beforeSend: options.cb_beforeSend,
                success: options.cb_success,
                error: options.cb_error,

            }).done(options.cb_done);
        }


        function submitFormSetVals(onetime = 0) {
            let speed = $('#speed').val();
            if (speed != "") {
                speed = parseInt(speed);
                increaseSpeed(submitFormSetVals, speed);
            } else {
                increaseSpeed(submitFormSetVals, 1);
            }

            let nowDateTime = new Date($('#stDate').val() + " " + $('#sttime').val());
            let d = nowDateTime.getTime();
            let time_minute_search = 0;

            let bidask_per_sec = result_bidask[count_records_bidask]
            time_minute_search = bidask_per_sec['Time'].substring(0, bidask_per_sec['Time'].length - 3)
            let time2show = bidask_per_sec['Time'].substr(bidask_per_sec['Time'].length - 8)
            $("#css_time_run").html(time2show);



            endTime = new Date();
            var timeDiff = endTime - startTime;
            timeDiff /= 1000;
            var seconds = timeDiff //Math.round(timeDiff);
            log("Speed: ", Speed, seconds + " seconds");
            //log(bidask_per_sec);


            $('#SnapData').val(count_records_bidask + 1);


            if ($('#stDate').val() < '2023-05-08') {
                if (bidask_per_sec != undefined) {
                    bidask_format = [{
                            volbid1: numberWithCommas(bidask_per_sec.VolBid1),
                            bid1: numberWithCommas(parseFloat(bidask_per_sec.Bid1).toFixed(2)),
                            ask5: numberWithCommas(parseFloat(bidask_per_sec.Ask5).toFixed(2)),
                            volask5: numberWithCommas(bidask_per_sec.VolAsk5)
                        }, {
                            volbid2: numberWithCommas(bidask_per_sec.VolBid2),
                            bid2: numberWithCommas(parseFloat(bidask_per_sec.Bid2).toFixed(2)),
                            ask4: numberWithCommas(parseFloat(bidask_per_sec.Ask4).toFixed(2)),
                            volask4: numberWithCommas(bidask_per_sec.VolAsk4)
                        }, {
                            volbid3: numberWithCommas(bidask_per_sec.VolBid3),
                            bid3: numberWithCommas(parseFloat(bidask_per_sec.Bid3).toFixed(2)),
                            ask3: numberWithCommas(parseFloat(bidask_per_sec.Ask3).toFixed(2)),
                            volask3: numberWithCommas(bidask_per_sec.VolAsk3)
                        },
                        {
                            volbid4: numberWithCommas(bidask_per_sec.VolBid4),
                            bid4: numberWithCommas(parseFloat(bidask_per_sec.Bid4).toFixed(2)),
                            ask2: numberWithCommas(parseFloat(bidask_per_sec.Ask2).toFixed(2)),
                            volask2: numberWithCommas(bidask_per_sec.VolAsk2)
                        }, {
                            volbid5: numberWithCommas(bidask_per_sec.VolBid5),
                            bid5: numberWithCommas(parseFloat(bidask_per_sec.Bid5).toFixed(2)),
                            ask1: numberWithCommas(parseFloat(bidask_per_sec.Ask1).toFixed(2)),
                            volask1: numberWithCommas(bidask_per_sec.VolAsk1)
                        }, {
                            sumvolbidtxt: "Sum Bid",
                            sumvolbidtxt2: " ",
                            sumvolbidtxt3: " ",
                            sumvolasktxt: "Sum Ask",
                        }, {
                            sumvolbidnum: numberWithCommas(parseInt(bidask_per_sec.VolBid1) +
                                parseInt(bidask_per_sec.VolBid2) + parseInt(bidask_per_sec.VolBid3) + parseInt(bidask_per_sec.VolBid4) + parseInt(bidask_per_sec.VolBid5)
                            ),
                            sumvolbidtxt2: " ",
                            sumvolbidtxt3: " ",
                            sumvolasknum: numberWithCommas(parseInt(bidask_per_sec.VolAsk1) +
                                parseInt(bidask_per_sec.VolAsk2) + parseInt(bidask_per_sec.VolAsk3) + parseInt(bidask_per_sec.VolAsk4) + parseInt(bidask_per_sec.VolAsk5)
                            ),
                        }
                    ]
                    new_bidask2compare = [{
                            volbid1: bidask_per_sec.VolBid1,
                            bid1: parseFloat(bidask_per_sec.Bid1).toFixed(2),
                            ask5: parseFloat(bidask_per_sec.Ask5).toFixed(2),
                            volask5: bidask_per_sec.VolAsk5
                        }, {
                            volbid2: bidask_per_sec.VolBid2,
                            bid2: parseFloat(bidask_per_sec.Bid2).toFixed(2),
                            ask4: parseFloat(bidask_per_sec.Ask4).toFixed(2),
                            volask4: bidask_per_sec.VolAsk4
                        }, {
                            volbid3: bidask_per_sec.VolBid3,
                            bid3: parseFloat(bidask_per_sec.Bid3).toFixed(2),
                            ask3: parseFloat(bidask_per_sec.Ask3).toFixed(2),
                            volask3: bidask_per_sec.VolAsk3
                        },
                        {
                            volbid4: bidask_per_sec.VolBid4,
                            bid4: parseFloat(bidask_per_sec.Bid4).toFixed(2),
                            ask2: parseFloat(bidask_per_sec.Ask2).toFixed(2),
                            volask2: bidask_per_sec.VolAsk2
                        }, {
                            volbid5: bidask_per_sec.VolBid5,
                            bid5: parseFloat(bidask_per_sec.Bid5).toFixed(2),
                            ask1: parseFloat(bidask_per_sec.Ask1).toFixed(2),
                            volask1: bidask_per_sec.VolAsk1
                        }, {
                            sumvolbidtxt: "Sum Bid",
                            sumvolbidtxt2: " ",
                            sumvolbidtxt3: " ",
                            sumvolasktxt: "Sum Ask",
                        }, {
                            sumvolbidnum: (parseInt(bidask_per_sec.VolBid1) +
                                parseInt(bidask_per_sec.VolBid2) + parseInt(bidask_per_sec.VolBid3) + parseInt(bidask_per_sec.VolBid4) + parseInt(bidask_per_sec.VolBid5)
                            ),
                            sumvolbidtxt2: " ",
                            sumvolbidtxt3: " ",
                            sumvolasknum: (parseInt(bidask_per_sec.VolAsk1) +
                                parseInt(bidask_per_sec.VolAsk2) + parseInt(bidask_per_sec.VolAsk3) + parseInt(bidask_per_sec.VolAsk4) + parseInt(bidask_per_sec.VolAsk5)
                            ),
                        }
                    ]
                    let x = createTable(bidask_format, type = 'bidask', rows = 6);
                    $('#bidask-body').html(x);
                    let t = $("#bidask-body");
                    let t_tr = t.find('tr');
                    if (old_bidask2compare.length > 0) {
                        for (var i = 0; i < new_bidask2compare.length; i++) {
                            var newObj = new_bidask2compare[i];
                            var oldObj = old_bidask2compare[i];
                            let newObjIndex = 0;
                            for (var prop in newObj) {
                                if (newObj.hasOwnProperty(prop) && oldObj.hasOwnProperty(prop)) {
                                    if (newObj[prop] !== oldObj[prop]) {
                                        t_tr_td = $(t_tr[i]).find('td');
                                        let comp_newObj = parseFloat(newObj[prop])
                                        let comp_oldObj = parseFloat(oldObj[prop])
                                        if (comp_newObj < comp_oldObj) {
                                            $(t_tr_td[newObjIndex]).css({
                                                'background-color': '#ff0011'
                                            });
                                        }
                                        if (comp_newObj > comp_oldObj) {
                                            $(t_tr_td[newObjIndex]).css({
                                                'background-color': '#22bb33'
                                            });
                                        }
                                    }
                                    newObjIndex++;
                                }
                            }
                        }
                    }
                    old_bidask2compare = new_bidask2compare;
                }
                
                if (result_tickmatch != undefined) {
                    let tickmatch_per_min = result_tickmatch.filter((x) => {
                        let xx = x.Time.substr(x.Time.length - 8);
                        return x.Time.substring(0, x.Time.length - 3) === time_minute_search
                    });

                    let tickmatch_in_range = result_tickmatch.filter((x) => {
                        let x1 = Date.parse(x.Time);
                        let x21 = Date.parse(sttime);
                        let x22 = Date.parse(entime);
                        return (x1 >= x21 && x1 <= x22)
                    });
                    
                    if (tickmatch_per_min.length > 0) {
                        tickmatch_hight_low = hight_low(tickmatch_per_min, 'Last');
                    }

                    tickmatch_format = [{
                        open: tickmatch_in_range.length > 0 ? numberWithCommas(parseFloat(tickmatch_in_range[0].Last).toFixed(2)) : 0,
                        heigh: tickmatch_hight_low.max.toFixed(2),
                        low: tickmatch_hight_low.min.toFixed(2),
                        close: tickmatch_in_range.length > 0 ? numberWithCommas(parseFloat(tickmatch_in_range[tickmatch_in_range.length - 1].Last).toFixed(2)) : 0,
                    }]
                    let x = createTable(tickmatch_format);
                    $('#open-close-body').html(x);

                    var jj = hight_low(result_tickmatch);
                    tickmatch_format2 = [{
                        open: result_tickmatch.length > 0 ? numberWithCommas(parseFloat(result_tickmatch[0].Last).toFixed(2)) : 0,
                        heigh: jj.max.toFixed(2),
                        low: jj.min.toFixed(2),
                        close: result_tickmatch.length > 0 ? numberWithCommas(parseFloat(result_tickmatch[result_tickmatch.length - 1].Last).toFixed(2)) : 0,
                    }]
                    let x2 = createTable(tickmatch_format2);
                    $('#open-close-actual-body').html(x2);
                }



            } else {
                if (bidask_per_sec != undefined) {
                    bidask_format = [{
                            volbid1: numberWithCommas(bidask_per_sec.VolBid1),
                            bid1: numberWithCommas(parseFloat(bidask_per_sec.Bid1).toFixed(2)),
                            ask10: numberWithCommas(parseFloat(bidask_per_sec.Ask10).toFixed(2)),
                            volask10: numberWithCommas(bidask_per_sec.VolAsk10)
                        }, {
                            volbid2: numberWithCommas(bidask_per_sec.VolBid2),
                            bid2: numberWithCommas(parseFloat(bidask_per_sec.Bid2).toFixed(2)),
                            ask9: numberWithCommas(parseFloat(bidask_per_sec.Ask9).toFixed(2)),
                            volask9: numberWithCommas(bidask_per_sec.VolAsk9)
                        }, {
                            volbid3: numberWithCommas(bidask_per_sec.VolBid3),
                            bid3: numberWithCommas(parseFloat(bidask_per_sec.Bid3).toFixed(2)),
                            ask8: numberWithCommas(parseFloat(bidask_per_sec.Ask8).toFixed(2)),
                            volask8: numberWithCommas(bidask_per_sec.VolAsk8)
                        }, {
                            volbid4: numberWithCommas(bidask_per_sec.VolBid4),
                            bid4: numberWithCommas(parseFloat(bidask_per_sec.Bid4).toFixed(2)),
                            ask7: numberWithCommas(parseFloat(bidask_per_sec.Ask7).toFixed(2)),
                            volask7: numberWithCommas(bidask_per_sec.VolAsk7)
                        }, {
                            volbid5: numberWithCommas(bidask_per_sec.VolBid5),
                            bid5: numberWithCommas(parseFloat(bidask_per_sec.Bid5).toFixed(2)),
                            ask6: numberWithCommas(parseFloat(bidask_per_sec.Ask6).toFixed(2)),
                            volask6: numberWithCommas(bidask_per_sec.VolAsk6)
                        },
                        //===========================================================================================================
                        {
                            volbid6: numberWithCommas(bidask_per_sec.VolBid6),
                            bid6: numberWithCommas(parseFloat(bidask_per_sec.Bid6).toFixed(2)),
                            ask5: numberWithCommas(parseFloat(bidask_per_sec.Ask5).toFixed(2)),
                            volask5: numberWithCommas(bidask_per_sec.VolAsk5)
                        }, {
                            volbid7: numberWithCommas(bidask_per_sec.VolBid7),
                            bid7: numberWithCommas(parseFloat(bidask_per_sec.Bid7).toFixed(2)),
                            ask4: numberWithCommas(parseFloat(bidask_per_sec.Ask4).toFixed(2)),
                            volask4: numberWithCommas(bidask_per_sec.VolAsk4)
                        }, {
                            volbid8: numberWithCommas(bidask_per_sec.VolBid8),
                            bid8: numberWithCommas(parseFloat(bidask_per_sec.Bid8).toFixed(2)),
                            ask3: numberWithCommas(parseFloat(bidask_per_sec.Ask3).toFixed(2)),
                            volask3: numberWithCommas(bidask_per_sec.VolAsk3)
                        }, {
                            volbid9: numberWithCommas(bidask_per_sec.VolBid9),
                            bid9: numberWithCommas(parseFloat(bidask_per_sec.Bid9).toFixed(2)),
                            ask2: numberWithCommas(parseFloat(bidask_per_sec.Ask2).toFixed(2)),
                            volask2: numberWithCommas(bidask_per_sec.VolAsk2)
                        }, {
                            volbid10: numberWithCommas(bidask_per_sec.VolBid10),
                            bid10: numberWithCommas(parseFloat(bidask_per_sec.Bid10).toFixed(2)),
                            ask1: numberWithCommas(parseFloat(bidask_per_sec.Ask1).toFixed(2)),
                            volask1: numberWithCommas(bidask_per_sec.VolAsk1)
                        }, {
                            none1_1: " ",
                            none1_2: " ",
                            none2_1: " ",
                            none2_2: " ",
                        }, {
                            sumvolbidtxt: "Sum Bid",
                            sumvolbidtxt2: " ",
                            sumvolbidtxt3: " ",
                            sumvolasktxt: "Sum Ask",
                        }, {
                            sumvolbidnum: numberWithCommas(parseInt(bidask_per_sec.VolBid1) +
                                parseInt(bidask_per_sec.VolBid2) + parseInt(bidask_per_sec.VolBid3) + parseInt(bidask_per_sec.VolBid4) + parseInt(bidask_per_sec.VolBid5) +
                                parseInt(bidask_per_sec.VolBid6) + parseInt(bidask_per_sec.VolBid7) + parseInt(bidask_per_sec.VolBid8) + parseInt(bidask_per_sec.VolBid9) + parseInt(bidask_per_sec.VolBid10)
                            ),
                            sumvolbidtxt2: " ",
                            sumvolbidtxt3: " ",
                            sumvolasknum: numberWithCommas(parseInt(bidask_per_sec.VolAsk1) +
                                parseInt(bidask_per_sec.VolAsk2) + parseInt(bidask_per_sec.VolAsk3) + parseInt(bidask_per_sec.VolAsk4) + parseInt(bidask_per_sec.VolAsk5) +
                                parseInt(bidask_per_sec.VolAsk6) + parseInt(bidask_per_sec.VolAsk7) + parseInt(bidask_per_sec.VolAsk8) + parseInt(bidask_per_sec.VolAsk9) + parseInt(bidask_per_sec.VolAsk10)
                            ),
                        }

                    ]
                    new_bidask2compare = [{
                            volbid1: bidask_per_sec.VolBid1,
                            bid1: parseFloat(bidask_per_sec.Bid1).toFixed(2),
                            ask10: parseFloat(bidask_per_sec.Ask10).toFixed(2),
                            volask10: bidask_per_sec.VolAsk10
                        }, {
                            volbid2: bidask_per_sec.VolBid2,
                            bid2: parseFloat(bidask_per_sec.Bid2).toFixed(2),
                            ask9: parseFloat(bidask_per_sec.Ask9).toFixed(2),
                            volask9: bidask_per_sec.VolAsk9
                        }, {
                            volbid3: bidask_per_sec.VolBid3,
                            bid3: parseFloat(bidask_per_sec.Bid3).toFixed(2),
                            ask8: parseFloat(bidask_per_sec.Ask8).toFixed(2),
                            volask8: bidask_per_sec.VolAsk8
                        }, {
                            volbid4: bidask_per_sec.VolBid4,
                            bid4: parseFloat(bidask_per_sec.Bid4).toFixed(2),
                            ask7: parseFloat(bidask_per_sec.Ask7).toFixed(2),
                            volask7: bidask_per_sec.VolAsk7
                        }, {
                            volbid5: bidask_per_sec.VolBid5,
                            bid5: parseFloat(bidask_per_sec.Bid5).toFixed(2),
                            ask6: parseFloat(bidask_per_sec.Ask6).toFixed(2),
                            volask6: bidask_per_sec.VolAsk6
                        },
                        //===========================================================================================================
                        {
                            volbid6: bidask_per_sec.VolBid6,
                            bid6: parseFloat(bidask_per_sec.Bid6).toFixed(2),
                            ask5: parseFloat(bidask_per_sec.Ask5).toFixed(2),
                            volask5: bidask_per_sec.VolAsk5
                        }, {
                            volbid7: bidask_per_sec.VolBid7,
                            bid7: parseFloat(bidask_per_sec.Bid7).toFixed(2),
                            ask4: parseFloat(bidask_per_sec.Ask4).toFixed(2),
                            volask4: bidask_per_sec.VolAsk4
                        }, {
                            volbid8: bidask_per_sec.VolBid8,
                            bid8: parseFloat(bidask_per_sec.Bid8).toFixed(2),
                            ask3: parseFloat(bidask_per_sec.Ask3).toFixed(2),
                            volask3: bidask_per_sec.VolAsk3
                        }, {
                            volbid9: bidask_per_sec.VolBid9,
                            bid9: parseFloat(bidask_per_sec.Bid9).toFixed(2),
                            ask2: parseFloat(bidask_per_sec.Ask2).toFixed(2),
                            volask2: bidask_per_sec.VolAsk2
                        }, {
                            volbid10: bidask_per_sec.VolBid10,
                            bid10: parseFloat(bidask_per_sec.Bid10).toFixed(2),
                            ask1: parseFloat(bidask_per_sec.Ask1).toFixed(2),
                            volask1: bidask_per_sec.VolAsk1
                        }, {
                            none1_1: " ",
                            none1_2: " ",
                            none2_1: " ",
                            none2_2: " ",
                        }, {
                            sumvolbidtxt: "Sum Bid",
                            sumvolbidtxt2: " ",
                            sumvolbidtxt3: " ",
                            sumvolasktxt: "Sum Ask",
                        }, {
                            sumvolbidnum: parseInt(bidask_per_sec.VolBid1) +
                                parseInt(bidask_per_sec.VolBid2) + parseInt(bidask_per_sec.VolBid3) + parseInt(bidask_per_sec.VolBid4) + parseInt(bidask_per_sec.VolBid5) +
                                parseInt(bidask_per_sec.VolBid6) + parseInt(bidask_per_sec.VolBid7) + parseInt(bidask_per_sec.VolBid8) + parseInt(bidask_per_sec.VolBid9) + parseInt(bidask_per_sec.VolBid10),
                            sumvolbidtxt2: " ",
                            sumvolbidtxt3: " ",
                            sumvolasknum: parseInt(bidask_per_sec.VolAsk1) +
                                parseInt(bidask_per_sec.VolAsk2) + parseInt(bidask_per_sec.VolAsk3) + parseInt(bidask_per_sec.VolAsk4) + parseInt(bidask_per_sec.VolAsk5) +
                                parseInt(bidask_per_sec.VolAsk6) + parseInt(bidask_per_sec.VolAsk7) + parseInt(bidask_per_sec.VolAsk8) + parseInt(bidask_per_sec.VolAsk9) + parseInt(bidask_per_sec.VolAsk10),
                        }

                    ]
                    let x = createTable(bidask_format, type = 'bidask');
                    $('#bidask-body').html(x);

                    let t = $("#bidask-body");
                    let t_tr = t.find('tr');
                    if (old_bidask2compare.length > 0) {
                        for (var i = 0; i < new_bidask2compare.length; i++) {
                            var newObj = new_bidask2compare[i];
                            var oldObj = old_bidask2compare[i];
                            let newObjIndex = 0;
                            for (var prop in newObj) {
                                if (newObj.hasOwnProperty(prop) && oldObj.hasOwnProperty(prop)) {
                                    if (newObj[prop] !== oldObj[prop]) {
                                        t_tr_td = $(t_tr[i]).find('td');
                                        let comp_newObj = parseFloat(newObj[prop])
                                        let comp_oldObj = parseFloat(oldObj[prop])
                                        if (comp_newObj < comp_oldObj) {
                                            $(t_tr_td[newObjIndex]).css({
                                                'background-color': '#ff0011'
                                            });
                                        }
                                        if (comp_newObj > comp_oldObj) {
                                            $(t_tr_td[newObjIndex]).css({
                                                'background-color': '#22bb33'
                                            });
                                        }
                                    }
                                    newObjIndex++;
                                }
                            }
                        }
                    }
                    old_bidask2compare = new_bidask2compare;
                }
                log(result_tickmatch)
                if (result_tickmatch != undefined) {

                    let tickmatch_per_min = result_tickmatch.filter((x) => {
                        let xx = x.Time.substr(x.Time.length - 8);
                        return x.Time.substring(0, x.Time.length - 3) === time_minute_search
                    });

                    let tickmatch_in_range = result_tickmatch.filter((x) => {
                        let x1 = Date.parse(x.Time);
                        let x21 = Date.parse(sttime);
                        let x22 = Date.parse(entime);
                        return (x1 >= x21 && x1 <= x22)
                    });

                    if (tickmatch_per_min.length > 0) {
                        tickmatch_hight_low = hight_low(tickmatch_per_min, 'Last');
                    }

                    var max_min_in_range = hight_low(tickmatch_in_range, 'Last')
                    tickmatch_format = [{
                        open: tickmatch_in_range.length > 0 ? numberWithCommas(parseFloat(tickmatch_in_range[0].Last).toFixed(2)) : 0,
                        heigh: tickmatch_hight_low.max.toFixed(2),
                        low: tickmatch_hight_low.min.toFixed(2),
                        close: tickmatch_in_range.length > 0 ? numberWithCommas(parseFloat(tickmatch_in_range[tickmatch_in_range.length - 1].Last).toFixed(2)) : 0,
                    }]
                    let x = createTable(tickmatch_format);
                    $('#open-close-body').html(x);

                    var jj = hight_low(result_tickmatch);
                    tickmatch_format2 = [{
                        open: result_tickmatch.length > 0 ? numberWithCommas(parseFloat(result_tickmatch[0].Last).toFixed(2)) : 0,
                        heigh: jj.max.toFixed(2),
                        low: jj.min.toFixed(2),
                        close: result_tickmatch.length > 0 ? numberWithCommas(parseFloat(result_tickmatch[result_tickmatch.length - 1].Last).toFixed(2)) : 0,
                    }]
                    let x2 = createTable(tickmatch_format2);
                    $('#open-close-actual-body').html(x2);
                }
            }

            if (onetime) {
                stopInterval();
            }

            count_records_bidask++;
        }

        function createTable(tableData, type = 'bidask', rows = 12) {
            var table = document.createElement('table');
            var tableBody = document.createElement('tbody');

            var count_rows = 0;

            tableData.forEach(function(rowData) {
                var row = document.createElement('tr');
                count_rows++;
                for (var key in rowData) {
                    var cell = document.createElement('td');
                    if (count_rows == parseInt(rows)) {
                        cell = document.createElement('th');
                        cell.style.color = '#1B7FD6';
                    }
                    cell.appendChild(document.createTextNode(rowData[key]));
                    row.appendChild(cell);
                }
                tableBody.appendChild(row);
            });
            return tableBody.innerHTML

        }

        function comp2val(val1, val2) {
            if (Date.parse('1970-01-01 ' + val2) < Date.parse('1970-01-01 ' + val1)) {
                let d = new Date($('#enDate').val());
                let today = new Date($('#today').val());
                d.setDate(d.getDate() + 1);

                if (d.getTime() < today.getTime()) {
                    let dd = d.getDate().toString().length == 1 ? "0" + d.getDate().toString() : d.getDate();
                    let mm = (d.getMonth() + 1).toString().length == 1 ? "0" + (d.getMonth() + 1).toString() : (d.getMonth() + 1);
                    let yy = d.getFullYear();
                    $('#enDate').val([yy, mm, dd].join('-'));
                } else {}
            }
        }


    });

    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    function hight_low(values, key) {
        var min = Math.min(...values.map(item => parseFloat(item.Last)));
        var max = Math.max(...values.map(item => parseFloat(item.Last)));
        return {
            max: max,
            min: min
        }
    }

    function startInterval(func) {
        startTime = new Date();
        count_down = setInterval(func, delay);
    }

    function stopInterval() {
        clearInterval(count_down);
    }

    function increaseSpeed(func, speed) {
        //delay /= speed; // decrease delay by half
        let d2delay = delay / speed;
        clearInterval(count_down);
        count_down = setInterval(func, d2delay);
    }

    function decreaseSpeed(speed) {
        delay *= 2; // increase delay by double
        clearInterval(count_down);
        //count_down = setInterval(myFunction, delay);
    }

    function addSpeed(speed) {
        //Speed = 2
        //increaseSpeed()
    }

    function myFunction() {
        // Code to be executed repeatedly at the specified interval

        endTime = new Date();
        var timeDiff = endTime - startTime; //in ms
        // strip the ms
        timeDiff /= 1000;

        // get seconds 
        var seconds = Math.round(timeDiff);
        log("Speed: ", Speed, seconds + " seconds");
    }
</script>