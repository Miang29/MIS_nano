$(document).ready(() => {
	// Change submit to either "Updating" or "Submitting" after click
	$('[type=submit], [data-action]').on('click', (e) => {
		let action = $(e.currentTarget).attr('data-action');

		if ($(e.currentTarget).attr('data-clicked') == 'true') {
			e.preventDefault()
		}
		else {
			if (action == 'submit')
				$(e.currentTarget).html(`<div class="spinner-border spinner-border-sm text-light" role="status"><span class="sr-only"></span></div> Submitting...`);
			else if (action == 'update')
				$(e.currentTarget).html(`<div class="spinner-border spinner-border-sm text-light" role="status"><span class="sr-only"></span></div> Updating...`);
			else if (action == 'filter')
				$(e.currentTarget).html(`<div class="spinner-border spinner-border-sm text-light" role="status"><span class="sr-only"></span></div> Filtering...`);
		}

		$(e.currentTarget).addClass(`disabled cursor-default`);
		$(e.currentTarget).attr('data-clicked', 'true');
	});

	$('form').on('submit', (e) => {$(this).find('[type=submit]').trigger('click');});
});