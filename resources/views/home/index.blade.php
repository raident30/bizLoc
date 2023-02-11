@extends('app-master')

@section('content')
<div class="gtco-loader" ></div>
    
<div id="page">
    <div id="gtco-header" class="gtco-cover gtco-cover-md" 
        role="banner" style="background-image: url({!! url('template/images/img_bg_2.jpg') !!})">
        <div id="app">

        </div>
    </div>
    {{-- <div class="gtco-cover gtco-cover-sm" style="background-image: url({!! url('template/images/img_bg_1.jpg') !!})"  data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="gtco-container text-center">
			<div class="display-t">
				<div class="display-tc">
					
				</div>	
			</div>
		</div>
	</div> --}}
</div>

@endsection