<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">List Work</h6>
            <!-- <a href="../Manager/index.php?act=unfinished">Show Unfinished</a>
            <a href="../Manager/index.php?act=complete">Show Completed</a> -->
        </div>
        <div class="table-responsive">
            <?php
            if (isset($_SESSION['error'])) {
                echo "<p style='color:red;'>" . $_SESSION['error'] . "</p>";
                unset($_SESSION['error']);
            }
            ?>
            <form action="<?= ROOT_URL ?>?url=WorkController/start" method="get">
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
                        $user = $_SESSION['user'];
                        $i = 1;
                        foreach ($data as $value) :
                            $count = $i++;
                        ?>
                            <tr>
                                <td style="width:5%;"><?= $count ?></td>
                                <td style="width:15%;"><?= $value['nameJob'] ?></td>
                                <td style="width:15%;"><b><?= $value['staff'] ?></b></td>
                                <td style="width:15%;"><?= $value['dateStart'] ?></td>
                                <td style="width:15%;"><?= $value['dateEnd'] ?></td>
                                <td style="width:10%;">

                                    <?php
                                    $jobID = $value['jobID'];
                                  
                                    if ($value['status'] == 'Start') {

                                        echo "<a type='button' href=" . ROOT_URL . "?url=WorkController/start/" . $jobID . " class='btn btn-outline-primary m-2'>Start</a>";
                                    } elseif ($value['status'] == 'Progressing') {
                                        echo "<a type='button'  href=" . ROOT_URL . "?url=WorkController/finish/" . $jobID . " class='btn btn-outline-warning m-2'>Processing</a>";
                                    } elseif ($value['status'] == 'Success') {
                                        echo "<a type='button'  href=" . ROOT_URL . "?url=WorkController/restartStaff/" . $jobID . " class='btn btn-success m-2'>Success</a>";
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
                                                date_default_timezone_set('Asia/Ho_Chi_Minh');
                                                $jobID = $value['jobID'];

                                                $datetime1 = new DateTime($value['dateStart']);
                                                $datetime2 = new DateTime($value['dateEnd']);
                                                // var_dump($datetime2);
                                                $interval = $datetime1->diff($datetime2);

                                                $now = new DateTime();
                                                $interval = $now->diff($datetime2);
                                                ?>

                                                <div class="modal-body">

                                                    <h5>Title: <?= $value['nameJob'] ?></h5>
                                                    <p>Status: <?= $value['status'] ?></p>
                                                    <p>Deadline:<b> <?= $value['dateEnd'] ?></b> </p>
                                                    <p>Time: <b> <?php if ($datetime2 < $now) {
                                                                        echo '<h4 style="color:red;">Time out</h4>';
                                                                    } else {
                                                                        $count = $interval->format('%d day, %h hours, %i minute , %s s');
                                                                        echo $count;
                                                                    } ?>
                                                        </b></p> <br>
                                                    <p>Success: <?= $value['deadline'] ?></p>
                                                    <p>TaskManger: <?= $value['manager'] ?></p>
                                                    <p>Staff: <?= $value['staff'] ?></p>
                                                    <p>File: <?= $value['file'] ?? 'not file' ?>
                                                    <form action="<?= ROOT_URL ?>?url=WorkController/down" method="get"><a href="uploads/<?= $value['file'] ?>" download class="btn btn-primary p-1">Download</a></form>
                                                    </p>
                                                    <p>Note: <?= $value['note'] ?></p>
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