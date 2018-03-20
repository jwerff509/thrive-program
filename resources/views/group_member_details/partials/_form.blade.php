<div class="container h-100">

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

    @foreach($members as $member)

      <div class="form-inline">

  <!--
        <div class="col-1">
          {!! Form::checkbox('active', '1', array('class' => 'form-control')) !!}
        </div>
      -->

        <div class="col-2">
          {!! Form::text('member_id', $member->nrc_number, array('class' => 'col-md-2 form-control')) !!}
        </div>

        <div class="col-w">
          {!! Form::text('family_name', $member->family_name, array('class' => 'form-control')) !!}
        </div>

        <div class="col-3">
          {!! Form::text('other_name', $member->other_name, array('class' => 'form-control')) !!}
        </div>

        <div class="col-2">
          {!! Form::text('sex', $member->sex, array('class' => 'form-control')) !!}
        </div>

        <div class="col-1">
          {!! Form::text('phone_number', $member->phone_number, array('class' => 'form-control')) !!}
        </div>

      </div>

    @endforeach

  @else

    @for($i=1; $i<=20; $i++)

      <!--
      {{-- }}

      <div class="form-group row form-inline col-md-offset-1">
          {!! Form::text('nrc_number[]', '', array('class' => 'form-control col-2', 'placeholder' => 'NRC #')) !!}
          {!! Form::text('family_name[]', '', array('class' => 'form-control col-2', 'placeholder' => 'Family Name')) !!}
          {!! Form::text('other_name[]', '', array('class' => 'form-control col-2', 'placeholder' => 'Other Name')) !!}
          {!! Form::select('sex[]', array('' => 'Sex...', 'M' => 'Male', 'F' => 'Female'), null, ['class' => 'form-control col-3']) !!}
          {!! Form::text('phone_number[]', '', array('class' => 'form-control col-3', 'placeholder' => 'Phone Number')) !!}
          {{-- }
          {!! Form::text('length[]', '', array('class' => 'form-control col', 'placeholder' => 'Length')) !!}
          {!! Form::text('width[]', '', array('class' => 'form-control col', 'placeholder' => 'Width')) !!}
          --}}
      </div>


    <fieldset class="scheduler-border">
	<legend class="scheduler-border">Bootstrap two column Form</legend>
	<form class="form-horizontal">
        -->


		<div class="row">

			<div class="form-group col-sm-6">
				<label for="formGroupExampleInput" class="control-label col-sm-2">Name</label>
				<div class="col-sm-10">
				  <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Jane Doe">
				</div>
			</div>

			<div class="form-group col-sm-6">
				<label for="formGroupExampleInput2" class="control-label col-sm-2">Email</label>
				<div class="col-sm-10">
				 <input type="email" class="form-control" id="formGroupExampleInput2" placeholder="jane.doe@example.com">
				</div>
			</div>

		</div>

    <!--
		<button type="submit" class="btn btn-primary">Sign in</button>
	</form>
</fieldset>
-->

    @endfor

  @endif


</div>

</div>

<div class="card-footer text-center">
  {!! Form::hidden('group_id', $group->id) !!}
  {!! Form::hidden('group_details_id', $groupDetails->id) !!}
  {!! Form::submit('Save Members', ['class' => 'btn btn-sm btn-primary', 'name' => 'submitbutton']) !!}
  {!! Form::reset('Clear Form',  ['class' => 'btn btn-sm btn-danger']) !!}
</div>
