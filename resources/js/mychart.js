import Chart from 'chart.js/auto';




new Chart(messageCtx, {
    type: 'line',
    data: messageData,
    options: {
        scales:{
            x: {
                title:{
                    display: true,
                    text: 'Mesi'
                }
            },
            y:{
                title:{
                    display: true,
                    text : 'Numero Messaggi'
                }
            },
            
    }
}
});

new Chart(reviewCtx, {
    type: 'line',
    data: reviewData,
    options: {
        scales:{
            x: {
                title:{
                    display: true,
                    text: 'Mesi/Anni'
                }
            },
            y:{
                title:{
                    display: true,
                    text : 'Numero Recensioni'
                }
            },
            
    }
}
});


new Chart(voteCtx, {
    type: 'bar',
    data: voteData,
    options: {
        scales: {
            x: {
                title: {
                    display: true,
                    text: 'Mesi/Anni'
                }
            },
            y: {
                beginAtZero: true,
                title: {
                    display: true,
                    text: 'Numero Voti'
                },
                ticks: {
                    stepSize: 1,
                    beginAtZero: true
                }
            }
        }
    }
});

