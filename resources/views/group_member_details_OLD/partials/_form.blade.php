<div class="container-fluid h-100">

  <div class="flash-message">
    @foreach(['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-'. $msg))
        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-'. $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
  </div>

<!-- {{-- }}
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
-->  --}}
-->

  <div class="justify-content-center">

{{--}}
<!--
  <div class="form-group form-inline col-md-offset-1">
    <div class="d-flex flex-row">
      <!-- {!! Form::label('active', 'Active ?', array('class' => 'form-control-label')) !!} -->
        {!! Form::label('member_id', 'NRC #', array('class' => 'form-control-label')) !!}
        {!! Form::label('family_name', 'HHID2', array('class' => 'form-control-label ')) !!}
        {!! Form::label('other_name', 'HHID3', array('class' => 'form-control-label col-2')) !!}
        {!! Form::label('sex', 'HHID4: Sex', array('class' => 'form-control-label col-2')) !!}
        {!! Form::label('phone_num', 'HHID5: Phone #', array('class' => 'form-control-label col-2')) !!}
    </div>
  </div>
-->
--}}


  @if(count($members) > 0)
    <!-- If there are members that belong to this group, display their details when building the form -->

    <?php
      $rowsLeft = (20 - count($members));
    ?>

    @foreach($members as $member)

      <div class="row form-inline justify-content-center">
          {!! Form::text('nrc_number[]', $member->nrc_number, array('class' => 'form-control col-md-1 col-lg-1 col-xl-1', 'placeholder' => 'NRC #')) !!}
          {!! Form::text('family_name[]', $member->family_name, array('class' => 'form-control col-md-1 col-lg-2 col-xl-2', 'placeholder' => 'Family Name')) !!}
          {!! Form::text('other_name[]', $member->other_name, array('class' => 'form-control col-md-1 col-lg-2 col-xl-2', 'placeholder' => 'Other Name')) !!}
          {!! Form::select('sex[]', array('' => 'Sex...', 'M' => 'Male', 'F' => 'Female'), array('selected' => $member->sex), ['class' => 'form-control col-md-1 col-lg-1 col-xl-1']) !!}
          {!! Form::text('phone_number[]', $member->phone_number, array('class' => 'form-control col-md-1 col-lg-2 col-xl-2', 'placeholder' => 'Phone Number')) !!}
          {!! Form::text('length[]', '', array('class' => 'form-control col-md-1 col-lg-2 col-xl-2', 'placeholder' => 'Length')) !!}
          {!! Form::text('width[]', '', array('class' => 'form-control col-md-1 col-lg-2 col-xl-2', 'placeholder' => 'Width')) !!}
      </div>

    @endforeach

    @for($i=1; $i<=$rowsLeft; $i++)

      <div class="row form-inline justify-content-center">
          {!! Form::text('nrc_number[]', '', array('class' => 'form-control col-md-1 col-lg-1 col-xl-1', 'placeholder' => 'NRC #')) !!}
          {!! Form::text('family_name[]', '', array('class' => 'form-control col-md-1 col-lg-2 col-xl-2', 'placeholder' => 'Family Name')) !!}
          {!! Form::text('other_name[]', '', array('class' => 'form-control col-md-1 col-lg-2 col-xl-2', 'placeholder' => 'Other Name')) !!}
          {!! Form::select('sex[]', array('' => 'Sex...', 'M' => 'Male', 'F' => 'Female'), null, ['class' => 'form-control col-md-1 col-lg-1 col-xl-1']) !!}
          {!! Form::text('phone_number[]', '', array('class' => 'form-control col-md-1 col-lg-2 col-xl-2', 'placeholder' => 'Phone Number')) !!}
          {!! Form::text('length[]', '', array('class' => 'form-control col-md-1 col-lg-2 col-xl-2', 'placeholder' => 'Length')) !!}
          {!! Form::text('width[]', '', array('class' => 'form-control col-md-1 col-lg-2 col-xl-2', 'placeholder' => 'Width')) !!}
      </div>

    @endfor

  @else

    @for($i=1; $i<=20; $i++)

      <div class="row form-inline justify-content-center">
          {!! Form::text('nrc_number[]', '', array('class' => 'form-control col-md-1 col-lg-1 col-xl-1', 'placeholder' => 'NRC #')) !!}
          {!! Form::text('family_name[]', '', array('class' => 'form-control col-md-1 col-lg-2 col-xl-2', 'placeholder' => 'Family Name')) !!}
          {!! Form::text('other_name[]', '', array('class' => 'form-control col-md-1 col-lg-2 col-xl-2', 'placeholder' => 'Other Name')) !!}
          {!! Form::select('sex[]', array('' => 'Sex...', 'M' => 'Male', 'F' => 'Female'), null, ['class' => 'form-control col-md-1 col-lg-1 col-xl-1']) !!}
          {!! Form::text('phone_number[]', '', array('class' => 'form-control col-md-1 col-lg-2 col-xl-2', 'placeholder' => 'Phone Number')) !!}
          {!! Form::text('length[]', '', array('class' => 'form-control col-md-1 col-lg-2 col-xl-2', 'placeholder' => 'Length')) !!}
          {!! Form::text('width[]', '', array('class' => 'form-control col-md-1 col-lg-2 col-xl-2', 'placeholder' => 'Width')) !!}
      </div>

    @endfor

  @endif


</div>

</div>

<div class="card-footer text-center">
  {!! Form::hidden('group_id', $surveyDetails->group_id) !!}
  {!! Form::hidden('group_details_id', $groupDetails->id) !!}
  {!! link_to(URL::previous(), 'Go Back', ['class' => 'btn btn-sm btn-primary']) !!}
  {!! Form::submit('Save Members', ['class' => 'btn btn-sm btn-primary', 'name' => 'submitbutton']) !!}
  {!! Form::reset('Clear Form',  ['class' => 'btn btn-sm btn-danger']) !!}
</div>
