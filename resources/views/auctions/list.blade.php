<x-app-layout>
    <style>
        .upload-invoice {
            display: none;
        }

        .loader {
            position: fixed;
            z-index: 1;
            width: 100%;
            height: 100%;
            align-items: center;
            top: 0;
            background: rgba(255, 255, 255, 0.7);
            display: flex;
            justify-contents: center;
        }
    </style>
    <div class="container-fluid">


        <div class="row justify-content-center">
            <div class="col-md-12">


                <div class="card">

                    <div class="card-body">
                        <table  class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Make</th>
                                    <th scope="col">Model</th>
                                    <th scope="col">Year</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">End Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="lsit_table">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $.ajax({
                url: '/fetch-data', 
                type: 'GET',
                success: function(data) {
                    // Clear existing table rows
                    
                    console.log(data);
                    // Populate the table with fetched data
                    $.each(data.data, function(index, item) {
                        
                        var row = '<tr>' +
                            '<td>' + item.Make + '</td>' +
                            '<td>' + item.Model + '</td>' +
                            '<td>' + item.Year + '</td>' +
                            '<td>' + item.StartDate + '</td>' +
                            '<td>' + item.EndDate + '</td>' +
                            '<td><a href="view/bidding/'+item.id+'">Show Bidding</a></td>' +
                            '</tr>';
                        $('#lsit_table').append(row);
                    });
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });

        window.onload = function() {
            Echo.channel("newAuctionChannel").listen("newauctionEvent", (res) => {
               
                var row = '<tr>' +
                            '<td>' + res.data.Make + '</td>' +
                            '<td>' + res.data.Model + '</td>' +
                            '<td>' + res.data.Year + '</td>' +
                            '<td>' + res.data.StartDate + '</td>' +
                            '<td>' + res.data.EndDate + '</td>' +
                            '<td><a href="view/bidding/'+ res.data.auctionID +'">Show Bidding</a></td>' +
                            '</tr>';
                        $('#lsit_table').append(row);
            });
        }
    </script>

</x-app-layout>
