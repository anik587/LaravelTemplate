<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $role->id }}</p>
</div>

<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $role->name }}</p>
</div>

<!-- Display Name Field -->
<div class="col-sm-12">
    {!! Form::label('display_name', 'Display Name:') !!}
    <p>{{ $role->display_name }}</p>
</div>

<!-- Guard Name Field -->
<div class="col-sm-12">
    {!! Form::label('guard_name', 'Guard Name:') !!}
    <p>{{ $role->guard_name }}</p>
</div>

<!-- Created By Field -->
<div class="col-sm-12">
    {!! Form::label('created_by', 'Created By:') !!}
    <p>{{ $role->created_by }}</p>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $role->status }}</p>
</div>

<!-- Deleted At Field -->
<div class="col-sm-12">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{{ $role->deleted_at }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $role->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $role->updated_at }}</p>
</div>

