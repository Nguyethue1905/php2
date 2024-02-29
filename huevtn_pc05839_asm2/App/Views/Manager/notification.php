<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-9">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Alerts</h6>
                <?php
                foreach ($data as $value) :
                    if ($value['status'] == 'Progressing') {
                        echo '<div class="alert alert-warning" role="alert">
                    ' . $value['staff'] . ' is doing the work 
                </div>';
                    } elseif ($value['status'] == 'Success') {
                        echo '<div class="alert alert-success" role="alert">
                        ' . $value['staff'] . ' gets the job done
                    </div>';
                    } elseif($value['status'] == 'Start') {
                        echo '
                        <div class="alert alert-primary" role="alert">
                        ' . $value['staff'] . ' has just started work
                        </div>
                        ';
                    }
                endforeach;
                ?>
            </div>
        </div>
    </div>
</div>

<!-- Recent Sales End -->