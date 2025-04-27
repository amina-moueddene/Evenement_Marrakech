<div class="page-content" style="background-color: #f9f9f9; min-height: 100vh;">
    <div class="page-header" style="background-color: rgb(234, 88, 12); color: white; padding: 20px; ">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Dashboard</h2>
        </div>
    </div>
    <section class="no-padding-top no-padding-bottom" style="padding: 20px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="statistic-block block" style="background-color: white; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); padding: 20px;">
                        <div class="progress-details d-flex align-items-end justify-content-between">
                            <div class="title">
                                <div class="icon" style="color: rgb(234, 88, 12);"><i class="icon-user-1"></i></div>
                                <H3 style="color: #000 ">New Clients</H3>
                            </div>
                            <div class="number dashtext-1" style="color: rgb(234, 88, 12); font-size: 1.5rem;">{{ $newClients }}</div>
                        </div>
                        <div class="progress progress-template" style="height: 8px; border-radius: 4px; background-color: #f1f1f1;">
                            <div role="progressbar" style="width: 100%; background-color: rgb(234, 88, 12);" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="statistic-block block" style="background-color: white; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); padding: 20px;">
                        <div class="progress-details d-flex align-items-end justify-content-between">
                            <div class="title">
                                <div class="icon" style="color: rgb(234, 88, 12);"><i class="icon-contract"></i></div>
                                <H3 style="color: #000 ">New Events</H3>
                            </div>
                            <div class="number dashtext-2" style="color: rgb(234, 88, 12); font-size: 1.5rem;">{{ $newEvents }}</div>
                        </div>
                        <div class="progress progress-template" style="height: 8px; border-radius: 4px; background-color: #f1f1f1;">
                            <div role="progressbar" style="width: 100%; background-color: rgb(234, 88, 12);" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>