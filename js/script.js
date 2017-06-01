jQuery(document).ready(function($){
    var maxDate = new Date();
    maxDate.setYear( maxDate.getFullYear() + 20 );
    var startDate,
        endDate,
        updateStartDate = function() {
            startPicker.setStartRange(startDate);
            endPicker.setStartRange(startDate);
            endPicker.setMinDate(startDate);
        },
        updateEndDate = function() {
            startPicker.setEndRange(endDate);
//						startPicker.setMaxDate(endDate);
            endPicker.setEndRange(endDate);
        },
        startPicker = new Pikaday({
            field: document.getElementById('departure_date'),
            format: 'Y-MM-DD',
            minDate: new Date(),
            maxDate: maxDate,
            onSelect: function() {
                startDate = this.getDate();
                updateStartDate();
            }
        }),
        endPicker = new Pikaday({
            field: document.getElementById('return_date'),
            format: 'Y-MM-DD',
            minDate: new Date(),
            maxDate: maxDate,
            onSelect: function() {
                endDate = this.getDate();
                updateEndDate();
            }
        }),
        _startDate = startPicker.getDate(),
        _endDate = endPicker.getDate();
    if (_startDate) {
        startDate = _startDate;
        updateStartDate();
    }
    if (_endDate) {
        endDate = _endDate;
        updateEndDate();
    }

    $('.fb-arrival-date #toggle_return').change(function(){
        if( $(this).is(':checked') ) {
            if( $(this).is(':checked') ) $('.fb-arrival-date #return_date_container input').attr('disabled',false);
            startPicker.setEndRange(startDate);
            startPicker.setMaxDate(endDate);
            $('#route_type').val('return');
        } else {
            $('.fb-arrival-date #return_date_container input').attr('disabled',true);
            startPicker.setEndRange(null);
            startPicker.setMaxDate(maxDate);
            $('#route_type').val('oneway');
        }
    });

});