<x-app-layout>
   
    <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-11">
              <div class="card">
                  <div class="card-header">{{ __('Dashboard') }}</div>

                  <div class="card-body">
                      <div class="row">
                          <div class="col-lg-3">
                              <a href="{{ url('/completed') }}">
                                  <div class="card">
                                      <div class="card-body">
                                          Completed Auctions
                                      </div>
                                  </div>
                              </a>

                          </div>


                          <div class="col-lg-3">


                              <a href="{{ url('/auction/create') }}">
                                  <div class="card">
                                      <div class="card-body">
                                          Add Auction request
                                      </div>
                                  </div>
                              </a>

                          </div>

                          <div class="col-lg-3">


                              <a href="{{ url('/auction/list') }}">
                                  <div class="card">
                                      <div class="card-body">
                                          Auction List
                                      </div>
                                  </div>
                              </a>

                          </div>


                          <div class="col-lg-3">

                              <a href="{{ url('/users') }}">
                                  <div class="card">
                                      <div class="card-body">
                                          Approve Users
                                      </div>
                                  </div>
                              </a>
                          </div>

                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>



<script type="text/javascript">
        $(document).ready(function() {
            $(".btn-success").click(function() {
                var html = $(".clone").html();
                $(".increment").after(html);
            });
            $("body").on("click", ".btn-danger", function() {
                $(this).parents(".control-group").remove();
            });






        Echo.channel('chat').listen('MessageEvent', (res) =>{
            alert(res);
        })



        });

       
</script>


</x-app-layout>
