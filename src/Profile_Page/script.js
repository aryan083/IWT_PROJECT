const projectData = {
    labels: ['January 2023', 'February 2023', 'March 2023', 'April 2023', 'May 2023', 'June 2023','January 2024', 'February 2024', 'March 2024', 'April 2024', 'May 2024', 'June 2024'],
    datasets: [{
        
        data: [0,6,0,4,9,2,5,5, 8, 6, 2, 15, 18], // Example data, you can replace it with actual data
        borderColor: 'rgb(75, 192, 192)',
        borderWidth: 5,
        fill: true
    }]
};

// Configuration options for the line chart
const chartOptions = {
    responsive: false,
    maintainAspectRatio: true,
    scales: {
        x: {
            title: {
                display: true,
                text: 'Time'
            }
        },
        y: {
            title: {
                display: true,
                text: 'Contirbutions'
            }
        }
    }
};

// Get the canvas element
const ctx = document.getElementById('projectChart').getContext('2d');

// Create the line chart
const projectChart = new Chart(ctx, {
    type: 'line',
    data: projectData,
    options: chartOptions
});