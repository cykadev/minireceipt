<!doctype html>
<html class="fixed sidebar-light">
	<head>
		<meta charset="UTF-8">
	    <meta name="csrf-token" content="{{ csrf_token() }}">
	    <title>{{ config('app.name', 'Laravel') }}</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<link rel="stylesheet" href="{{ 'css/app.css' }}">

	</head>
	<body>
	<div id="app">
		<section class="body">

				{{-- Hide Header And Sidebar When Print Popup --}}
				<template v-if="this.$store.state.printview == false">
				@include('layouts.dashboardMaster.headerSection')
				<adminnavbar></adminnavbar>
				<editmodal v-if="this.$store.state.editmodalopen == true" slot="header"></editmodal>
				</template>
				<printview v-if="this.$store.state.printwatch == true"></printview>
				<print v-if="this.$store.state.printview"></print>
					@yield('content')

	</div>
		<script src="{{ asset('js/app.js') }}"></script>

	</body>
</html>