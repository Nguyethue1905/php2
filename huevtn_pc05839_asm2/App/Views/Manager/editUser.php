<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-8 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Edit Staff</h6>
                <form method="post" action="<?=ROOT_URL?>?url=WorkController/store" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="" class="form-label">Username</label>
                        <input type="text" class="form-control" id="" name="nameUser" value="tgthtr">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="text" class="form-control" id="" name="email" value="tgthtr">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input type="password" class="form-control" id="" name="password" value="tgthtr">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Avatar</label>
                        <img src="" alt="">
                        <input type="file" class="form-control" id="" name="avatar">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Phone</label>
                        <input type="phone" class="form-control" id="" name="phone" value="">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Position</label>
                        <input type="text" class="form-control" id="" name="position" value="">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">NameCompany</label>
                        <input type="text" class="form-control" id="" name="nameCompany" value="">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Add</button>
                </form>
            </div>      
        </div>
        <div class="col-sm-12 col-xl-6">
            <div class="d-flex align-items-center justify-content-between mb-4">
            <div class="col-xl-10 order-xl-1">
                            <div class="card bg-secondary shadow">
                                <div class="card-header bg-white border-0">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <h3 class="mb-0">My account</h3>
                                        </div>
                                        <div class="col-4 text-right">
                                            <a href="#!" class="btn btn-sm btn-primary">Settings</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <h6 class="heading-small text-muted mb-4">User information</h6>
                                        <div class="pl-lg-4">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="input-username">Username</label>
                                                        <input type="text" id="input-username" class="form-control form-control-alternative" placeholder="Username" value="lucky.jesse">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="input-email">Email address</label>
                                                        <input type="email" id="input-email" class="form-control form-control-alternative" placeholder="jesse@example.com">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="input-first-name">First name</label>
                                                        <input type="text" id="input-first-name" class="form-control form-control-alternative" placeholder="First name" value="Lucky">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="input-last-name">Last name</label>
                                                        <input type="text" id="input-last-name" class="form-control form-control-alternative" placeholder="Last name" value="Jesse">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="my-4" />
                                        <!-- Address -->
                                        <h6 class="heading-small text-muted mb-4">Contact information</h6>
                                        <div class="pl-lg-4">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="input-address">Address</label>
                                                        <input id="input-address" class="form-control form-control-alternative" placeholder="Home Address" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="input-city">City</label>
                                                        <input type="text" id="input-city" class="form-control form-control-alternative" placeholder="City" value="New York">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="input-country">Country</label>
                                                        <input type="text" id="input-country" class="form-control form-control-alternative" placeholder="Country" value="United States">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="input-country">Postal code</label>
                                                        <input type="number" id="input-postal-code" class="form-control form-control-alternative" placeholder="Postal code">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="my-4" />
                                        <!-- Description -->
                                        <h6 class="heading-small text-muted mb-4">About me</h6>
                                        <div class="pl-lg-4">
                                            <div class="form-group">
                                                <label>About Me</label>
                                                <textarea rows="4" class="form-control form-control-alternative" placeholder="A few words about you ...">A beautiful Dashboard for Bootstrap 4. It is Free and Open Source.</textarea>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
            
        </div>
    </div>
</div>
<!-- Recent Sales End -->

