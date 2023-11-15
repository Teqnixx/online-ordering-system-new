// dashboard charts
$.ajax({
    url: '../getdata/gettop5products.php', 
    type: 'GET',
    success : function(data){
        var obj = jQuery.parseJSON(data);
        var xlabel = [], ylabel=[];
        var barColors = ["#0070FF", "#0058E1","#0041C5","#002DA8","#001B8D"];
        for(var i=0; i<obj.length; i++){
            xlabel.push(obj[i][0]);
            ylabel.push(obj[0, i][1]);
        }
        new Chart("top5-products", {
            type: "bar",
            data: {
                labels: xlabel,
                datasets: [{
                    backgroundColor: barColors,
                    data: ylabel
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: "Top 5 Most Purchased Products"
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        })
    }
});
