@extends('app')

@section('head')
		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

		<style>
			body {
				margin: 0;
				padding: 0;
				width: 100%;
				height: 100%;
				color: #B0BEC5;
			}

			.container {
				text-align: center;
				display: table-cell;
				vertical-align: middle;
                font-weight: 100;
                font-family: 'Lato';
			}

			.content {
				text-align: center;
				display: inline-block;
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
			<div class="content">
				<div class="title">Laravel 5</div>
				<div class="quote">{{ Inspiring::quote() }}</div>
			</div>
            <a>Click me</a>
            <pre><?php
            $output = shell_exec('ls ../../../scripts -lart 2>&1');
            echo $output ?></pre>
		</div>
@endsection