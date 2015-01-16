@section('charter')
	{
		value: {{ $data['chart']['status'] }},
		color:"#F38630"
	},
	{
		value : {{ $data['chart']['photo'] }},
		color : "#00FA9A"
	},
	{
		value : {{ $data['chart']['link'] }},
		color : "#69D2E7"
	},
	{
		value : {{ $data['chart']['video'] }},
		color : "#5C246E"
	}
@stop