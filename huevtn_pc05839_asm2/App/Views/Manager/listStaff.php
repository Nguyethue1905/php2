<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">List Work</h6>
            <a href="">Show Unfinished</a>
            <a href="">Show Completed</a>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th scope="col" style="width:5%;">#</th>
                        <th scope="col" style="width:10%;">Avatar</th>
                        <th scope="col" style="width:15%;">Name</th>
                        <th scope="col" style="width:20%;">Position</th>
                        <th scope="col" style="width:10%;">Progress</th>
                        <th scope="col" style="width:10%;">Finished</th>
                        <th scope="col" style="width:10%;">Status</th>
                        <th scope="col" style="width:10%;">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($data as $value) :
                        // if($value['status'] === 'Staff'){
                            $count = $i++;
                       
                    ?>
                        <tr>
                            <td style="width:5%;"><?=$count?></td>
                            <td style="width:10%;">
                                <img src="../../../public/img/<?=$value['avatar']?? 'avatar.jfif'?>" alt="" class="rounded-circle me-lg-2" style="width: 50px; height: 50px;">
                            </td>
                            <td style="width:20%;"><?=$value['nameUser']?></td>
                            <td style="width:20%;"><?=$value['position']?></td>
                            <td style="width:10%;">3</td>
                            <td style="width:10%;">7</td>
                            <td style="width:10%;"><?=$value['status']?></td>
                            <td style="width:5%;">
    <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#exampleModal<?=$value['userID']?>">
        Details
    </button>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal<?=$value['userID']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">User Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                 
                     
                    <img src="../../../public/img/<?=$value['avatar']?? 'avatar.jfif'?>" alt=""><br>
                   <b>Name: <?=$value['nameUser']?></b> <br>
                    Status: <?=$value['status']?><br>
                    Phone: <?=$value['phone']?><br>
                    Positon: <?=$value['position']?><br>
                    Company: <?=$value['nameCompany']?><br>
                    <!-- etc. -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</td>
 </tr>

                    <?php
                    //  }
                    endforeach;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Recent Sales End -->