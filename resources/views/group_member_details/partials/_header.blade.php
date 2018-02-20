<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="box box-info">
            <div class="box-header with-border">
                <div class="panel-heading text-center">
                  <p>Group:<b> {{ $group->name }}</b></p>
                  <p>Area Program:<b> {{ $group->area_program }}</b></p>
                  <p>Village Name:<b> {{ $group->village_name }}</b></p>
                  <p>Reporting Term:<b> {{ $rptTerm->description }}, {{ $groupDetails->year }}</b></p>
                </div>
            </div>
          </div>
