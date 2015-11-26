/**
 *  Make it possible to select opt-groupes
 */
$(".receivers").on('select2-selecting', function (e) {

	var select = $(this);

	if (e.val == '') {
		e.preventDefault();
		childs = e.choice.children;
		select.select2('data', select.select2('data').concat(childs));
		select.select2('close');
	}
});

/**
 *  Select options events handler
 */
$('#select-options li a').on('click', function (e) {
	action = $(this).attr('data-action');
	select = $(".receivers");
	switch (action) {
		case 'select':
			alldata = [];
			for (var i = data.length - 1; i >= 0; i--) {
				alldata.push.apply(alldata, data[i].children);;
			};
			select.select2('data', alldata);
			break;
		case 'unselect':
			select.select2('data', []);
			break;
	}
});

/* Search in table logic */
$("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();

    $("table tr").each(function(index) {
        if (index !== 0) {
            $row = $(this);
            
            var id;
            var $tdElement = $row.find("td").each(function() {
                td = $(this);
                id += td.text().toLowerCase();
            });
            var matchedIndex = id.indexOf(value);

            if (matchedIndex == -1 ) {
                $row.hide();
            }
            else {
                $row.show();
            }
        }
    });
});

$('#flash-overlay-modal').modal();
