
$(document).ready(function () {
        $('.airlines_arrival').on('change', function () {
            var airline = this.value;
            $("#flight-number").html('');
            const location = window.location.origin;
            const getcode = location + '/getCodeIATA'
            //Mostramos los valores en consola:
            //var userLanguage = window.navigator.userLanguage || window.navigator.language;
            $.ajax({
                url: getcode,               //"{{route('fetchState', app()->getLocale())}}",
                type: "POST",
                data: {
                    airline: airline,
                    //_token: '{{csrf_token()}}'
                },
                dataType: 'json',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (result) {
                    iata_arrival = result.code['iata_code'];
                    $("#iata_arrival").html(iata_arrival);
                }
            });
        });

        $('.airlines_departure').on('change', function () {
            var airline = this.value;

            $("#flight-number").html('');
            const location = window.location.origin;
            const getcode = location + '/getCodeIATA'
            //Mostramos los valores en consola:
            //var userLanguage = window.navigator.userLanguage || window.navigator.language;
            $.ajax({
                url: getcode,               //"{{route('fetchState', app()->getLocale())}}",
                type: "POST",
                data: {
                    airline: airline,
                    //_token: '{{csrf_token()}}'
                },
                dataType: 'json',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (result) {
                    var iata_departure = result.code['iata_code'];
                    $("#iata_departure").html(iata_departure);
                    }
            });
        });
});


function iata_code_arrival() {
    let flight = document.getElementById("flight_number_arrival").value;
    var code = $("#iata_arrival").html();
    iata_arrival =  code + flight;
    // console.log(iata_arrival);
    $("#iata_airline_arrival").val(iata_arrival);
}

function iata_code_departure(){
    let flight = document.getElementById("flight_number_departure").value;
    var code = $("#iata_departure").html();
    iata_departure =  code + flight;
    // console.log(iata_departure);
    $("#iata_airline_departure").val(iata_departure);
}
