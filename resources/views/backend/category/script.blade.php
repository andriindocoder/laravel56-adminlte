@section('script')
	<script type="text/javascript">
		$('#pagination').addClass('no-margin pagination-sm');

		$('#title').on('blur',function(){
			var theTitle = this.value.toLowerCase().trim(),
				slugInput = $('#slug');
				theSlug = theTitle.replace(/&/g, '-and')
								.replace(/[^a-z0-9-]+/g,'-')
								.replace(/\-\-+/g, '-')
								.replace(/^-+|-+$/g, '');

			slugInput.val(theSlug);
		});
	</script>
@endsection