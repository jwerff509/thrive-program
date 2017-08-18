<div class="form-group row">
  {!! Form::label('report_term_desc', 'Reporting Term:', array('class' => 'col-md-6 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::select('report_term_desc', array(
      'October - December' => 'October - December',
      'January - March' => 'January - March',
      'April - June' => 'April - June',
      'July - September' => 'July - September',
    )) !!}
    <span class="help-block"></br></span>
  </div>
</div>
<div class="form-group row">
  {!! Form::label('year', 'Reporting Year:', array('class' => 'col-md-6 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::select('year', array(
      '2021' => '2021',
      '2020' => '2020',
      '2019' => '2019',
      '2018' => '2018',
      '2017' => '2017',
      '2016' => '2016',
      '2015' => '2015',
      '2014' => '2014',
    )) !!}
    <span class="help-block"></br></span>
  </div>
</div>
<div class="form-group row">
  {!! Form::label('question_1', 'How many members does the household have:', array('class' => 'col-md-6 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::select('question_1', array(
      '0' => 'Eight or more',
      '7' => 'Seven',
      '9' => 'Six',
      '11' => 'Five',
      '15' => 'Four',
      '21' => 'Three',
      '29' => 'One or two',
    )) !!}
    <span class="help-block"></br></span>
  </div>
</div>
<div class="form-group row">
  {!! Form::label('question_2', 'Are all household members aged 7 to 16 currently attending school:', array('class' => 'col-md-6 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::select('question_2', array(
      '0' => 'No',
      '3' => 'Yes',
      '6' => 'No one 7 to 16',
    )) !!}
    <span class="help-block"></br></span>
  </div>
</div>
<div class="form-group row">
  {!! Form::label('question_3', 'What is the highest grade that the female head/spouse has attained:', array('class' => 'col-md-6 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::select('question_3', array(
      '0' => 'None, or first to fifth grade',
      '2' => 'Sixth grade',
      '4' => 'Seventh to ninth grade',
      '9' => 'Tenth grade or higher',
      '5' => 'No female head/spouse',
    )) !!}
    <span class="help-block"></br></span>
  </div>
</div>
<div class="form-group row">
  {!! Form::label('question_4', 'What kind of building material is the floor of this dwelling made of:', array('class' => 'col-md-6 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::select('question_4', array(
      '0' => 'Mud, wood only, or other',
      '2' => 'Concrete, or covered concrete',
    )) !!}
    <span class="help-block"></br></span>
  </div>
</div>
<div class="form-group row">
  {!! Form::label('question_5', 'What kind of building material is the roof of this dwelling made of:', array('class' => 'col-md-6 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::select('question_5', array(
      '0' => 'Grass/straw/thatch, or other',
      '3' => 'Iron sheets, or other non-asbestos tiles',
      '5' => 'Concrete, asbestos sheets, or asbestos tiles',
    )) !!}
    <span class="help-block"></br></span>
  </div>
</div>
<div class="form-group row">
  {!! Form::label('question_6', 'What is the main type of energy that your household uses for cooking:', array('class' => 'col-md-6 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::select('question_6', array(
      '0' => 'Firewood, coal, crop/livestock residues, or other',
      '4' => 'Charcoal',
      '15' => 'Gas, electricity, solar, or kerosene/paraffin',
    )) !!}
    <span class="help-block"></br></span>
  </div>
</div>
<div class="form-group row">
  {!! Form::label('question_7', 'Does your household own any televisions, DVDs/VCRs or home theatres, or satellite dish/decoders (free to air, or DSTV) or other pay-TV arrangements:', array('class' => 'col-md-6 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::select('question_7', array(
      '0' => 'No TVs (regardless of others)',
      '6' => 'TV, but nothing else',
      '10' => 'TV, and something else (DVD, dish, etc.)',
    )) !!}
    <span class="help-block"></br></span>
  </div>
</div>
<div class="form-group row">
  {!! Form::label('question_8', 'Does your household own any non-electric or electric irons:', array('class' => 'col-md-6 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::select('question_8', array(
      '0' => 'None',
      '4' => 'Only non-electric',
      '11' => 'Electric, or both electric and non-electric',
    )) !!}
    <span class="help-block"></br></span>
  </div>
</div>
<div class="form-group row">
  {!! Form::label('question_9', 'Does your household own any cellular phones:', array('class' => 'col-md-6 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::select('question_9', array(
      '0' => 'No',
      '6' => 'Yes',
    )) !!}
    <span class="help-block"></br></span>
  </div>
</div>
<div class="form-group row">
  {!! Form::label('question_10', 'How many beds and mattresses does your household own:', array('class' => 'col-md-6 form-control-label')) !!}
  <div class="col-md-4">
    {!! Form::select('question_10', array(
      '0' => 'None',
      '2' => 'One or more beds, but no mattresses',
      '4' => 'One mattress (regardless of beds)',
      '7' => 'Two or more mattresses (regardless of beds)',
    )) !!}
    <span class="help-block"></br></span>
  </div>
</div>
<div class="card-footer text-center">
  {!! Form::hidden('person_id', $person->id) !!}
  {!! Form::submit('Save and Add Another Household', ['class' => 'btn btn-sm btn-primary', 'name' => 'submitbutton']) !!}
  {!! Form::submit('Save and Close', ['class' => 'btn btn-sm btn-primary', 'name' => 'submitbutton']) !!}
  {!! Form::reset('Clear Form',  ['class' => 'btn btn-sm btn-danger']) !!}
</div>
