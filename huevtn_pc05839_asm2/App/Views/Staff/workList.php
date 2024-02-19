<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">List Work</h6>
            <a href="../Manager/index.php?act=unfinished">Show Unfinished</a>
            <a href="../Manager/index.php?act=complete">Show Completed</a>
        </div>
        <div class="table-responsive">
            <form action="<?=ROOT_URL?>?url=WorkController/start" method="get">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th scope="col" style="width:5%;">#</th>
                        <th scope="col" style="width:15%;">Job</th>
                        <th scope="col" style="width:15%;">Staff</th>
                        <th scope="col" style="width:15%;">Start day</th>
                        <th scope="col" style="width:15%;">End date</th>
                        <th scope="col" style="width:10%;">Status</th>
                        <th scope="col" style="width:10%;">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($data as $value) :
                        $count = $i++;
                    ?>
                        <tr>
                            <td style="width:5%;"><?= $count?></td>
                            <td style="width:15%;"><?= $value['nameJob'] ?></td>
                            <td style="width:15%;"><?= $value['staff'] ?></td>
                            <td style="width:15%;"><?= $value['dateStart'] ?></td>
                            <td style="width:15%;"><?= $value['dateEnd'] ?></td>
                            <td style="width:10%;">
                            
                            <?php
                                $jobID = $value['jobID'];
                                 if($value['status'] == 'Start'){
                                    echo "<a type='button' href=".ROOT_URL."?url=WorkController/start/".$jobID." class='btn btn-outline-primary m-2'>Start</a>";
                                 }elseif($value['status'] == 'Progressing'){
                                    echo "<a type='button'  href=".ROOT_URL."?url=WorkController/finish/".$jobID." class='btn btn-outline-warning m-2'>Processing</a>";
                                 }elseif($value['status'] == 'Success'){
                                    echo '<button type="button" class="btn btn-success m-2">Success</button>';
                                 }
                            ?> 
                            </td>
                            <?php
                                // var_dump($value['jobID']);
                                ?>
                            <td style="width:10%;">
                                    <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $value['jobID'] ?>">
                                    Details
                                </button>

                                <div class="modal fade" id="exampleModal<?= $value['jobID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Job Details</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <?php
                                            $jobID = $value['jobID'];
                                            
                                            $datetime1 = new DateTime($value['dateStart']);
                                            $datetime2 = new DateTime($value['dateEnd']);
                                            $interval = $datetime1->diff($datetime2);
                                            $time =  $interval->format('%d ngày, %h giờ, %i phút và %s giây');
                                            
                                            $now = new DateTime();
                                            $interval = $now->diff($datetime2);
                                            $count = $interval->format('%d ngày, %h giờ, %i phút và %s giây');
                                            ?>

                                            <div class="modal-body">

                                                <b>Title: <?=$value['nameJob'] ?></b> <br>
                                                Status: <?=$value['status'] ?><br>
                                                Time: <?=$time ?><br>
                                                Deadline: <?=$count ?><br>
                                                TaskManger: <?=$value['manager'] ?><br>
                                                Staff: <?=$value['staff'] ?><br>
                                                File: <?=$value['file']?> <form action="<?=ROOT_URL?>?url=WorkController/down" method="get"><a href="uploads/<?= $value['file'] ?>" download class="btn btn-primary p-1">Download</a></form> <br>
                                                Note: <?= $value['note'] ?><br>
                                                <!-- etc. -->
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                </tbody>
            </table>
            </form>
        </div>
    </div>
</div>
<!-- Recent Sales End -->