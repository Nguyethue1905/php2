<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-8 col-xl-6 justify-content-center">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Edit Work</h6>
                <?php
                // echo $data[0]['jobID'];
                ?>
                <form method="post" action="<?=ROOT_URL?>?url=WorkController/editWork/<?=$data[0]['jobID']?>" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="" class="form-label">Start day</label>
                        <input type="datetime-local" class="form-control" id="" name="dateStart" value="<?=$data[0]['dateStart']?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">End day</label>
                        <input type="datetime-local" class="form-control" id="" name="dateEnd" value="<?=$data[0]['dateEnd']?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Note</label>
                        <input class="form-control" id="" cols="80" rows="3" name="note" value="<?=$data[0]['note']?>"></input>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Update</button>
                </form>
            </div>
            </div>      
        </div>
    </div>
</div>
<!-- Recent Sales End -->

