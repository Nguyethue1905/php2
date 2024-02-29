<!-- Sale & Revenue Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-6 col-xl-4">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-line fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Total Work</p>
                    <h6 class="mb-0"><?= $data['total'] ?></h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-4">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-bar fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Progressing</p>
                    <h6 class="mb-0"><?= $data['progressing'] ?></h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-4">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-area fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Succsess</p>
                    <h6 class="mb-0"><?= $data['succsess'] ?></h6>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Sale & Revenue End -->


<!-- Sales Chart Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Job statistics</h6>
             
                </div>
                <canvas id="worldwide-sales"></canvas>

                <script>
                    var totalStart = <?php echo json_encode($data['start'], JSON_NUMERIC_CHECK); ?>;
                    var totalProgressing = <?php echo json_encode($data['progressing'], JSON_NUMERIC_CHECK); ?>;
                    var totalSuccess = <?php echo json_encode($data['succsess'], JSON_NUMERIC_CHECK); ?>;

                    var ctx1 = document.getElementById('worldwide-sales').getContext('2d');
                    var myChart1 = new Chart(ctx1, {
                        type: 'bar',
                        data: {
                            labels: ['Status'],
                            datasets: [{
                                label: 'Start',
                                data: [totalStart],
                                backgroundColor: 'rgba(0, 156, 255, .7)'
                            }, {
                                label: 'Progressing',
                                data: [totalProgressing],
                                backgroundColor: 'rgba(0, 156, 255, .5)'
                            }, {
                                label: 'Success',
                                data: [totalSuccess],
                                backgroundColor: 'rgba(0, 156, 255, .3)'
                            }]
                        },
                        options: {
                            responsive: true
                        }
                    });
                </script>
            </div>
        </div>
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Job statistics</h6>
                </div>
                <canvas id="salse-revenue"></canvas>
            </div>
        </div>
    </div>
</div>
<!-- Sales Chart End -->


