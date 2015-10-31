var $date_field = $('input[name="date"]'),
	now = new Date();
$date_field.minical({
	date_format: function(date) {
		return [date.getDate(), date.getMonth() + 1, date.getFullYear()].join("-");
	},
	initialize_with_date: false,
	from: now
});
