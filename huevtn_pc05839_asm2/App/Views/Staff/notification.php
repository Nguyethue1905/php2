<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-9">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Alerts</h6>
                <?php
                $user = $_SESSION['user'] ;
                foreach ($data as $value) :

                    if($value['staff'] == $user['nameUser'] ){
                        echo ' 
                        <div class="alert alert-primary" role="alert">
                            '.$value['manager'].' has just created a job for you
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