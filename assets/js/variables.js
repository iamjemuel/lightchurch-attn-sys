var types = ['success', 'info', 'warning', 'danger'];

var icon = ['pe-7s-attention', 'pe-7s-check'];

var leader = ['No lifegroup leader', 'Ronald Acuna', 'Alvin Madronio', 'Albert Madronio', 'Glenn Corpuz', 'Mark Christian De Omania', 'Arjuna Aguilar', 'Mel Aguilar', 'Carla Baldomero', 'Mechole Williams', 'Dorothy Magbuhos', 'Jenny Madronio', 'Stephanie Cadiong', 'Robert/Mike', 'Clariza Fortuna', 'Elena Encio', 'Jessica Calanog', 'Restie Cadiong'];

var month_name = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

var slots = ['All', '7AM', '9AM', '11AM', '2PM', '4PM', '6PM', '8PM', '10PM'];

var type = ['Member', 'Visitor'];

var a = window.location.href;

// var loc = 'http://lightchurch.com.ph/attendance/';
// var url = 'http://lightchurch.com.ph/attn/';
var url = 'http://localhost/attn/';


var helper = {

    showNotification: function(from, align, color, icons, message){

        $.notify({

            icon: icon[icons],

            message: message



        },{

            type: types[color],

            timer: 50,

            placement: {

                from: from,

                align: align

            }

        });

    },

    convertDate: function(date){

        var fullDate = new Date(date);

        var twoDigitMonth = fullDate.getMonth() + "";

        var twoDigitDate = fullDate.getDate() + "";

        if (twoDigitDate.length == 1)

            twoDigitDate = "0" + twoDigitDate;



        var currentDate = month_name[twoDigitMonth] + " " + twoDigitDate + ", " + fullDate.getFullYear();

        return currentDate;

    },



    convertTime: function(time, sec) {

        var hours = time[0] + time[1];

        var min = time[3] + time[4];

        if (hours < 12) {

            return hours + ':' + min +':'+sec +' AM';

        } else {

            hours= hours - 12;

            hours=(hours.length < 10) ? '0'+hours:hours;

            return hours+ ':' + min +':'+sec +' PM';

        }

    },



    getDate: function(){

        var today = new Date();

        var mm = (today.getMonth()+1) + '';

        var dd = today.getDate() + '';



        if(mm.length == 1){

            mm = '0' +mm;

        }

        if(dd.length == 1){

            dd = '0'+dd;

        }



        return today.getFullYear() +'-'+ mm +'-'+ dd;

    },

    convertMilli: function(s){
        var mydate = new Date(s);
        return mydate.getTime();
    },

    getParameterByName: function(name, url) {

        if (!url) url = a;

        name = name.replace(/[\[\]]/g, "\\$&");

        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),

            results = regex.exec(url);

        if (!results) return null;

        if (!results[2]) return '';

        return decodeURIComponent(results[2].replace(/\+/g, " "));

    },



    displayPagination: function(total, page){

        var num = '';

        var object = '';

        if(helper.getParameterByName('display') == null){

            num = 1;

        }else{

            num = helper.getParameterByName('display');

        }

        for(var i = 1; i<=total; i++){

            var active = '';

            if(num == i){

                active = 'active';

            }

            object += '<li class="'+active+'"><a href="'+loc+'admin.php?page='+page+'&display='+i+'">'+i+'</a></li>';

        }

        // return object;

    },



    displayRecordCount: function(total, start, end){

        if(start == ''){

            $('#display_text').html('<b>'+total+'</b>');

            $('#total_text').html('<b>'+total+' record(s)</b>');

        }else{

            $('#total_text').html('<b>'+total+' record(s)</b>');

            $('#display_text').html('<b>'+start+' to '+end+'</b>');

        }



    },



    clock: function(id){

        date = new Date;

        year = date.getFullYear();

        month = date.getMonth();

        months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'Jully', 'August', 'September', 'October', 'November', 'December');

        d = date.getDate();

        day = date.getDay();

        days = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');

        h = date.getHours();

        if(h<10){

            h = "0"+h;

        }

        m = date.getMinutes();



        if(m<10)

        {

            m = "0"+m;

        }



        s = date.getSeconds();

        if(s<10){

            s = "0"+s;

        }

        var t = helper.convertTime(h+':'+m, s);

        if(s<10)

        {

                s = "0"+s;

        }

        result = '<br><small class="pull-right" style="margin-right: 30px;">'+months[month]+' '+d+' '+year+' ('+days[day]+') '+t+'</small><br>';

        document.getElementById(id).innerHTML = result;

        setTimeout('helper.clock("'+id+'");','1000');

        return true;

    },

    Print: function(what, page){
        $('#p_timeslot').val($("input[type='radio'][name='timeslot']:checked").val());
        $('#p_network').val($('#network').val());
        $('#p_member').val($('#member').text());
        $('#p_visitor').val($('#visitor').text());
        $('#p_total').val($('#total').text());

        if(page == 'current'){
            if(what == 0){
                $('#view').val('current');
                $('#preview').append('<input type="hidden" name="p_date" value="'+today+'">');
                document.preview.submit();
            }else if(what == 1){
                $('#view').val('current');
                $('#preview').append('<input type="hidden" name="p_date" value="'+today+'"><input type="hidden" name="p_result" value="'+$('#results').html()+'">');
                document.preview.submit();
            }else{
                alert('Error: Print what.');
            }
        }else if(page == 'services'){
            if(what == 0){
                $('#view').val('services');
                $('#preview').append('<input type="hidden" name="p_from" value="'+$('#from').val()+'"><input type="hidden" name="p_to" value="'+$('#to').val()+'">');
                document.preview.submit();
            }else if(what == 1){
                $('#view').val('services');
                $('#preview').append('<input type="hidden" name="p_from" value="'+$('#from').val()+'"><input type="hidden" name="p_to" value="'+$('#to').val()+'"><input type="hidden" name="p_result" value="'+$('#results').html()+'">');
                document.preview.submit();
            }else{
                alert('Error: Print page.');
            }
        }else{
            alert('Error: Print page.');
        }
        // $('#p_from').val($('#from').val());
        // $('#p_to').val($('#to').val());
        // $('#view').val(what);
        // <input type="hidden" name="p_from" id="p_from">
        // <input type="hidden" name="p_to" id="p_to">
    }

}
