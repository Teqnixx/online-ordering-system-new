
// dashboard charts
function generateChart() {
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
}

$(document).ready(function() {
    $('.retire-button').click(function() {
        var productID = document.getElementById('product-id-field').value;
        
        Swal.fire({
            title: "Retire product?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes"
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    type: 'POST',
                    url: 'retireproduct.php',
                    data: {
                        'id': productID
                    }
                });
                Swal.fire({
                    title: "Retired.",
                    text: "Product has been retired.",
                    icon: "success"
                });
            }
        });
    });
});

$(document).ready(function() {
    $('.save-button').click(function() {
        var productID = document.getElementById('product-id-field').value;
        var productName = document.getElementById('product-name-field').value;
        var productPrice = document.getElementById('product-price-field').value;
        var productType = document.getElementById('product-type-selector').value;
        var productCategory = document.getElementById('product-category-selector').value;

        var productType = productType.split(" - ");
        var productCategory = productCategory.split(" - ");

        Swal.fire({
            title: "Product Saved.",
            icon: "success"
        }).then((result) => {
            if(result.isConfirmed){
                $.ajax({
                    type: 'POST',
                    url: 'updateproduct.php',
                    data: {
                        'id': productID,
                        'name': productName,
                        'price': productPrice,
                        'type': productType[0],
                        'category': productCategory[0]
                    }
                });
            }
            window.location.reload();
        });
    });
});

$(document).ready(function() {
    $('.add-stock-button').click(function() {
        var productID = $(this).parents('tr').data('id');
        Swal.fire({
            title: "Stock number",
            input: "number",
            inputAttributes: {
                autocapitalize: "off"
            },
            showCancelButton: true,
            confirmButtonText: "Save",
            preConfirm: async(stock) => {
                $.ajax({
                    type: 'POST',
                    url: 'addproductstock.php',
                    data: {
                        'productID': productID,
                        'stock': stock
                    }
                });
            }
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Stock added!",
                    icon: "success"
                }).then(() => {
                    window.location.reload();
                });
            }
        });
    });
});