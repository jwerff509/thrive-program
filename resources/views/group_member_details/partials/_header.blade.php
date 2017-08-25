<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                  <p>Group:<b> {{ $group->name }}</b></p>
                  <p>Area Program:<b> {{ $group->area_program }}</b></p>
                  <p>Village Name:<b> {{ $group->village_name }}</b></p>
                  <p>Reporting Term:<b> {{ $groupDetails->report_term_desc }}, {{ $groupDetails->year }}</b></p>
                </div>
