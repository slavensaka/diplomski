
@extends('app')

@section('content')

<h1>File Upload</h1>
<?= Form::open(array('files' => TRUE)) ?>
<?= Form::label('myfile', 'My File') ?>
<br>
<?= Form::file('myfile') ?>
<br>
<?= Form::submit('Send it!') ?>
<?= Form::close() ?>

@endsection