
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

            <input type="hidden" value="{{ $auction_id }}" id="auction_id">

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
                                    <th scope="col">User</th>
                                    <th scope="col">Bid Price</th>
                                    <th scope="col">Bid Date Time</th>
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
            
            id = $('#auction_id').val();
            $.ajax({
                url: '/view-bidding-data/'+id, 
                type: 'GET',
                success: function(data) {
                
                    
                    $.each(data, function(index, item) {
                       
                        var row = '<tr>' +
                            '<td>' + item.auctions.Make + '</td>' +
                            '<td>' + item.auctions.Model + '</td>' +
                            '<td>' + item.auctions.Year + '</td>' +
                            '<td>' + item.user.name + '</td>' +
                            '<td>' + item.latestBid + '</td>' +
                            '<td>' + item.bidTime + '</td>' +
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
            Echo.channel("bidding").listen("BiddingEvent", (res) => {       
                $.each(res, function(index, item) {   
                    if(item.auctionID == $('#auction_id').val()){

                        var row = '<tr>' +
                            '<td>' + item.auctions.Make + '</td>' +
                            '<td>' + item.auctions.Model + '</td>' +
                            '<td>' + item.auctions.Year + '</td>' +
                            '<td>' + item.user.name + '</td>' +
                            '<td>' + item.latestBid + '</td>' +
                            '<td>' + item.bidTime + '</td>' +
                            '</tr>';
                        $('#lsit_table').append(row);
                    }
                  });    
            });
        }
    </script>

</x-app-layout>
