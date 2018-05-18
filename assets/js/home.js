var home = {

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

        result = '<center><h3>'+months[month]+' '+d+' '+year+' ('+days[day]+')</h3>';

        result += '<h1 style="font-size: 80px;">'+t+'</h1>';

        document.getElementById(id).innerHTML = result;

        setTimeout('home.clock("'+id+'");','1000');

        return true;

    },

    Search: function(keyword){
        $.ajax({
            url: url + 'apps/controllers/home/action.controller.php',
            type: 'POST',
            dataType: 'json',
            data: {keyword: keyword, action: 'searchrecord'}
        }).done(function(response){
            
            if(response.success){
                // console.log(response.result);
                var content = '';
                var count = 0;
                var datein = '';
                for(var i = 0; i <= response.result.length-1; i++){
                    content += '<tr><td>'+response.result[i].firstname+' '+response.result[i].middlename+' '+response.result[i].lastname+'</td><td><button class="btn btn-success btn-sm" onclick="home.Login('+response.result[i].id+', '+response.result[i].type+', '+null+')">LOG IN</button></td></tr>';
                    count++;
                }
                $('#result').html(content);
                $('#count').html('<b>'+count+'</b> record(s) found.');
            }else{
                $('#result').html('No record found');
                
            }
        }).fail(function(jqXHR, responseText){
            alert('Error! Please contact your webmaster');
        });
    },

    Login: function(id, type, datein){
        if($("input[type='radio'][name='slot']:checked").val() != null){
            $.ajax({
                url: url + 'apps/controllers/home/action.controller.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    id: id, 
                    type: type,
                    datein: datein,
                    timeslot: $("input[type='radio'][name='slot']:checked").val(),
                    action: 'login'}
            }).done(function(response){
                if(response.success){
                    helper.showNotification('bottom', 'left', 0, 1, response.note);
                    console.log(response.note);
                }else{
                    console.log(response.note);
                    helper.showNotification('bottom', 'left', 3, 0, response.note);
                }
            }).fail(function(jqXHR, responseText){
                alert('Error! Please contact your webmaster');
            }); 
        }else{
            helper.showNotification('bottom', 'left', 2, 0, ' Choose timeslot.');
        }
        
    }
}