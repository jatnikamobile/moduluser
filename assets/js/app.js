var datatable = $('.data-table-basic').DataTable({
	"order": [[ 0, "desc" ]]
});

function money(number) {
	return new Intl.NumberFormat(['ban', 'id']).format(number);
}

function date_convert(date) {
	const next = new Date(date);
	next.setDate(next.getDate());
	const ye = new Intl.DateTimeFormat('en', { year: 'numeric' }).format(next);
	const mo = new Intl.DateTimeFormat('en', { month: '2-digit' }).format(next);
	const da = new Intl.DateTimeFormat('en', { day: '2-digit' }).format(next);
	return ye+'-'+mo+'-'+da;
}
