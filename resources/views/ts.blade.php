@extends('app')

@section('head')
		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

		<style>
			.container {
				text-align: center;
				display: table-cell;
				vertical-align: middle;
                font-weight: 100;
                font-family: 'Lato';
			}

			.title {
				font-size: 96px;
				margin-bottom: 40px;
			}

			.quote {
				font-size: 24px;
			}
		</style>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="title">Team Speak</div>
            <div class="quote">Controll panel</div>

            <pre>{{$output}}</pre>
            <form action="{{ url('ts') }}" method="get" class="form-signin">
                <input type="submit" name="command" value="Status" class="btn btn-lg btn-primary btn-block">
                <input type="submit" name="command" value="Start" class="btn btn-lg btn-success btn-block">
                <input type="submit" name="command" value="Restart" class="btn btn-lg btn-warning btn-block">
                <input type="submit" name="command" value="Stop" class="btn btn-lg btn-danger btn-block">
            </form>
        </div>
    </div>
</div>
@endsection