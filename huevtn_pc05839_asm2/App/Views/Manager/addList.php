<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-9 col-xl-8">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Add Job</h6>
                <?=$_SESSION['message']?>
                <form method="post" action="<?=ROOT_URL?>?url=WorkController/store" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="" class="form-label">Title</label>
                        <input type="text" class="form-control" id="" name="nameJob">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Staff</label>
                        <div class="option-staff">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example"  name="nameStaff" >
                                <option>Staff</option>
                                <?php
                                foreach ($data as $value) :
                                ?>
                                    <option value="<?=$value['userID']?>"><?= $value['nameUser']?></option>
                                <?php
                                endforeach;
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Start day</label>
                        <input type="datetime-local" class="form-control" id="" name="dateStart">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">End day</label>
                        <input type="datetime-local" class="form-control" id="" name="dateEnd">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">File</label>
                        <input type="file" class="form-control" id="" name="file">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Note</label>
                        <textarea class="form-control" id="" cols="80" rows="3" name="note"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Add</button>
                </form>
            </div>
        </div>
       
    </div>
</div>
<!-- Recent Sales End -->

