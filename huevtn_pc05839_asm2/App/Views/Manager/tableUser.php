<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0"> Top 5 employees</h6>
          
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th scope="col" style="width:5%;">#</th>
                        <th scope="col" style="width:10%;">IMG</th>
                        <th scope="col">Staff</th>
                        <th scope="col">Total</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($data as $value) :
                        $count = $i++;
                    ?>
                        <tr>
                            <td style="width:5%;"><?=$count?></td>
                            <td style="width:10%;">
                                <img src="../../../public/img/<?=$value['img']?? 'avatar.jfif'?>" alt="" class="rounded-circle me-lg-2" style="width: 50px; height: 50px;" />
                            </td>
                            <td><?=$value['name']?></td>
                            <td><?=$value['count']?></td>
                            <td><?=$value['position']?></td>
                        </tr>
                        <tr>
                        <?php
                    endforeach;
                        ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Recent Sales End -->


<!-- Widgets Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-md-6 col-xl-12">
            <div class="h-100 bg-light rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Calender</h6>
                    <a href="">Show All</a>
                </div>
                <div id="calender"></div>
            </div>
        </div>
    </div>
</div>
<!-- Widgets End -->