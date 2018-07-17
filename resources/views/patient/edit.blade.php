{!! Form::open(['action' => ['PatientsController@update',$patient->id], 'method'=>'PUT', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data']) !!}
                        
<div class="modal-header">
        <h3 class="modal-title">Edit Patient</h3>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true"> &times; </span>
    </button>
</div>

<div class="modal-body">
    <div class="form-group">
        <label for="name" class=" control-label">Patient Surname</label>
        <div class="">
            {{Form::text('surname', $patient->surname,['class'=>'form-control', 'autofocus', 'required'])}}
            <span class="help-block with-errors"></span>
        </div>
    </div>
    <div class="form-group">
        <label for="name" class="control-label">Patient Other Names</label>
        <div class="">
            {{Form::text('other_names', $patient->other_names,['class'=>'form-control', 'autofocus', 'required'])}}
            <span class="help-block with-errors"></span>
        </div>
    </div>
    <div class="form-group">
        <label for="name" class="control-label">Patient ID No.</label>
        <div class="">
            {{Form::text('id_number', $patient->id_number,['class'=>'form-control', 'autofocus', 'required'])}}
            <span class="help-block with-errors"></span>
        </div>
    </div>
    <div class="form-group">
        <label for="name" class="control-label">Patient Phone</label>
        <div class="">
            {{Form::text('phone_number', $patient->phone_number,['class'=>'form-control', 'autofocus', 'required'])}}
            <span class="help-block with-errors"></span>
        </div>
    </div>
    <div class="form-group">
        <label for="name" class="control-label">Patient Alt. Phone</label>
        <div class="">
            {{Form::text('alt_phone_number', $patient->alt_phone_number,['class'=>'form-control', 'autofocus', 'required'])}}
            <span class="help-block with-errors"></span>
        </div>
    </div>
    <div class="form-group">
        <label for="name" class="control-label">Patient Next of Kin Name</label>
        <div class="">
            {{Form::text('next_kin_name', $patient->next_kin_name,['class'=>'form-control', 'autofocus', 'required'])}}
            <span class="help-block with-errors"></span>
        </div>
    </div>
    <div class="form-group">
        <label for="name" class="control-label">Patient Next of Kin Number</label>
        <div class="">
            {{Form::text('kin_phone_number', $patient->kin_phone_number,['class'=>'form-control', 'autofocus', 'required'])}}
            <span class="help-block with-errors"></span>
        </div>
    </div>
</div>

<div class="modal-footer">
    <button type="submit" class="btn btn-primary btn-save"> Add </button>
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
</div>

{!! Form::close() !!}