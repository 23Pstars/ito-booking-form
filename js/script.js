jQuery(document).ready(function($){
    var maxDate = new Date();
    maxDate.setYear( maxDate.getFullYear() + 20 );

    var startDateFB,
        endDateFB,
        updateStartDateFB = function() {
            startPicker.setStartRange(startDateFB);
            endPicker.setStartRange(startDateFB);
            endPicker.setMinDate(startDateFB);
        },
        updateEndDateFB = function() {
            startPicker.setEndRange(endDateFB);
            endPicker.setEndRange(endDateFB);
        },
        startPicker = new Pikaday({
            field: document.getElementById('fb_departure_date'),
            format: 'Y-MM-DD',
            minDate: new Date(),
            maxDate: maxDate,
            onSelect: function() {
                startDateFB = this.getDate();
                updateStartDateFB();
            }
        }),
        endPicker = new Pikaday({
            field: document.getElementById('fb_return_date'),
            format: 'Y-MM-DD',
            minDate: new Date(),
            maxDate: maxDate,
            onSelect: function() {
                endDateFB = this.getDate();
                updateEndDateFB();
            }
        }),
        _startDateFB = startPicker.getDate(),
        _endDateFB = endPicker.getDate();
    if (_startDateFB) {
        startDateFB = _startDateFB;
        updateStartDateFB();
    }
    if (_endDateFB) {
        endDateFB = _endDateFB;
        updateEndDateFB();
    }

    var startDateFL,
        endDateFL,
        updateStartDateFL = function() {
            startPicker.setStartRange(startDateFL);
            endPicker.setStartRange(startDateFL);
            endPicker.setMinDate(startDateFL);
        },
        updateEndDateFL = function() {
            startPicker.setEndRange(endDateFL);
            endPicker.setEndRange(endDateFL);
        },
        startPicker = new Pikaday({
            field: document.getElementById('fl_departure_date'),
            format: 'Y-MM-DD',
            minDate: new Date(),
            maxDate: maxDate,
            onSelect: function() {
                startDateFL = this.getDate();
                updateStartDateFL();
            }
        }),
        endPicker = new Pikaday({
            field: document.getElementById('fl_return_date'),
            format: 'Y-MM-DD',
            minDate: new Date(),
            maxDate: maxDate,
            onSelect: function() {
                endDateFL = this.getDate();
                updateEndDateFL();
            }
        }),
        _startDateFL = startPicker.getDate(),
        _endDateFL = endPicker.getDate();
    if (_startDateFL) {
        startDateFL = _startDateFL;
        updateStartDateFL();
    }
    if (_endDateFL) {
        endDateFL = _endDateFL;
        updateEndDateFL();
    }



    $('.fb-arrival-date #toggle_return').change(function(){
        if( $(this).is(':checked') ) {
            if( $(this).is(':checked') ) $('.fb-arrival-date #return_date_container input').attr('disabled',false);
            startPicker.setEndRange(startDateFB);
            startPicker.setMaxDate(endDateFB);
            $('#fb_route_type').val('return');
        } else {
            $('.fb-arrival-date #return_date_container input').attr('disabled',true);
            startPicker.setEndRange(null);
            startPicker.setMaxDate(maxDate);
            $('#fb_route_type').val('oneway');
        }
    });

    $('.fl-arrival-date #toggle_return').change(function(){
        if( $(this).is(':checked') ) {
            if( $(this).is(':checked') ) $('.fl-arrival-date #return_date_container input').attr('disabled',false);
            startPicker.setEndRange(startDateFL);
            startPicker.setMaxDate(endDateFL);
            $('#fl_route_type').val('return');
        } else {
            $('.fl-arrival-date #return_date_container input').attr('disabled',true);
            startPicker.setEndRange(null);
            startPicker.setMaxDate(maxDate);
            $('#fl_route_type').val('oneway');
        }
    });

});