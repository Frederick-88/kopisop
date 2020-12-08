<?php
$label = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
$data = $orders->getOrderAllMonth();
?>

<div class="card w-100 mb-5 mt-5">
    <canvas id="myChart" class="w-100"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?php echo json_encode($label); ?>,
            datasets: [{
                label: 'Total Revenur Per Month',
                data: <?php echo json_encode($data); ?>,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255,99,132,1)',
                borderWidth: 1
            }]
        },
        options: {
            title: {
                display: true,
                text: "Revenue in Year",
                fontFamily: 'Gotham',
                fontSize: 30,
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        callback: function(value, index, values) {
                            return "Rp " + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                        }
                    }
                }]
            },
            tooltips: {
                callbacks: {
                    title: function(tooltipItem, data) {
                        return data['labels'][tooltipItem[0]['index']];
                    },
                    label: function(tooltipItem, data) {
                        value= data['datasets'][0]['data'][tooltipItem['index']]
                        value = "Rp " + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
                        return value;
                    },
                },
            },

            responsive: false,
        }
    });
</script>