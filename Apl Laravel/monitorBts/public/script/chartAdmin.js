// Pie Chart
const ctx = document.getElementById('myPieChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: [
            '5',
            '4',
            '3',
            '2',
            '1'
        ],
        datasets: [{
            label: 'My First Dataset',
            data: [205, 104, 85, 124, 174],
            backgroundColor: [
            '#198754',
            'rgb(54, 162, 235)',
            'rgb(255, 205, 86)',
            '#ffc107',
            '#dc3545'
            ],
            hoverOffset: 4
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});


