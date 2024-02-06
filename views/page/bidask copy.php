<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<style>
    @import url('https://fonts.googleapis.com/css?family=Roboto:400,500,700,900&display=swap');

    body {
        font-family: 'Roboto', sans-serif;
    }

    h2 {
        font-family: SemiBold;
    }
</style>

<?php
function isWeekend($date)
{
    $weekDay = date('w', strtotime($date));
    return ($weekDay == 0 || $weekDay == 6);
}

$default_search_day = isWeekend(date("Y-m-d", strtotime("-1 days"))) == 1 ? date("Y-m-d", strtotime("-3 days")) : date("Y-m-d", strtotime("-1 days"));

?>

<div class="content-wrapper1">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">



            <!-- <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Collapsible Card Example</h3>
                    <div class="card-tools">
                       
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    </div>
                   
                </div>
                
                <div class="card-body">
                    The body of the card
                </div>
                
            </div> -->

            <div class=" d-flex justify-content-center">
                <div class="card col-9">
                    <div class="container">
                        <div class="form-wrap">
                            <h2>
                                <center>
                                    <p style="color:#1B7FD6">BID-ASK</p>
                                </center>
                            </h2>
                            <hr width="20%" style="color:#F2F2F2">

                            <!-- <div class="card card">
                                <div class="card-header">
                                    <button class="btn btn-sm btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">X</button>
                                </div>
                            </div> -->

                            <div class="card">
                                <!-- <div class="card-header"  >
                                    <p class="card-title">Collapsible Card Example</p>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                    </div>
                                </div> -->

                                <div class="card-body">

                                    <div class="form-row">
                                        <div class="col-4 ">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <!-- <label id="email-label" for="stDate" class="col-form-label-sm text-white">.</label> -->
                                                    <input type="text" value="" name="symbol" id="symbol" placeholder="Symbol" class="form-control form-control-sm col-8" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label id="email-label" for="stDate" class="col-form-label-sm col-3 px-0 ">Start Date :</label>
                                                        <!-- <label for="" class="text-danger p-0 form-control-sm">
                                                        <h6 style="font-size:0.85rem;">* ไม่สามารถค้นหาวันที่ปัจจุบันได้ </h6>
                                                    </label> -->
                                                        <div class="col-8 p-0">
                                                            <input type="date" name="stDate" id="stDate" value="<?php echo $default_search_day; ?>" class="form-control form-control-sm" max=<?php echo $default_search_day; ?> required>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label id="email-label" for="enDate" class="col-form-label-sm">End date</label>
                                                        <!-- <label for="" class="text-danger">
                                                        <h6 style="font-size:0.85rem;">* ไม่สามารถค้นหาวันที่ปัจจุบันได้ </h6>
                                                    </label> -->
                                                        <input type="date" name="enDate" id="enDate" value="<?php echo $default_search_day; ?>" class="form-control form-control-sm col-6" max=<?php echo $default_search_day; ?> required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="col-4">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label id="email-label" for="enDate" class="col-form-label-sm">End date</label>
                                                    <label for="" class="text-danger">
                                                        <h6 style="font-size:0.85rem;">* ไม่สามารถค้นหาวันที่ปัจจุบันได้ </h6>
                                                    </label>
                                                    <input type="date" name="enDate" id="enDate" value="<?php echo $default_search_day; ?>" class="form-control form-control-sm" max=<?php echo $default_search_day; ?> required>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="form-row">
                                        <div class="col-4 ">
                                            <div class="col-md-12">

                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label id="name-label" for="sttime" class="col-form-label-sm">Start Time</label>
                                                    <input type="time" name="sttime" id="sttime" value="10:00" class="form-control" min="10:00" max="16:30" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label id="email-label" for="entime" class="col-form-label-sm">End Time</label>
                                                    <input type="time" name="entime" id="entime" value="16:30" class="form-control" min="10:00" max="16:30" required>
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




        </div>
    </div>
</div>