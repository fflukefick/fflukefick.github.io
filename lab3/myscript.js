$(document).ready(function() {
    $('#advanceidd').hide();

    $('#advancebtn').click(function(){
        $('#advanceidd').toggle();
    });
    $.ajax({
        url: "data.json",
        dataType: "json"
    }).done(function(response) {
        console.log(response);
        var data ="";
        response.forEach(element => {
            console.log(element.name, element.brand)
            data +="<tr>"+
            "<td>"+element.name+"</td>"+
            "<td>"+element.brand+"</td>"+
            "<td>"+element.price+"</td>"+
            "<td>"+element.display+"</td>"+
            "<td>"+element.weight+"</td></tr>";
            $('#notebook').html(data);
        });
    });
});
$('#reset-btn').click(function() {
    console.log('click on submit button');         
    $('#input-text').val('');
});
$('#submit-btn').click(function() {
    console.log('click on submit button');      
    $('#result').text($('#input-text').val());
    $.ajax({
        url: "data.json",
        dataType: "json"
    }).done(function(response){
        console.log(response)
        var data ="";
        var check = false
        response.forEach(element => {
            if(element.name.toUpperCase().includes($('#input-text').val().toUpperCase())){
                console.log(element.name, element.brand , element.price , element.display , element.weight)
                data +="<tr>"+
                "<td>"+element.name+"</td>"+
                "<td>"+element.brand+"</td>"+
                "<td>"+element.price+"</td>"+
                "<td>"+element.display+"</td>"+
                "<td>"+element.weight+"</td></tr>";
                $('#notebook').html(data);
                check = true;
            }
        });
        if(check == false){
            alert("Not found this notebook name.");
        }
    });
});
var slider = document.getElementById("myRange");
      var output = document.getElementById("demo");
      output.innerHTML = slider.value;
      
      slider.oninput = function() {
        output.innerHTML = this.value;
        console.log(output);
      }
$('#adv-sub').click(function(){
    $.ajax({
        url: "data.json",
        dataType: "json"
    }).done(function(response){
        
        var weight = [];
        $.each($("input[name='weight']:checked"), function(){            
            weight.push($(this).val());
            console.log(weight);
        });
        var brand = [];
        $.each($("input[name='brand']:checked"), function(){
            brand.push($(this).val());
            console.log(brand);
        });
        var display = [];
        $.each($("input[name='display']:checked"), function(){
            display.push($(this).val());
            console.log(display);
        });
        var data = "";
        var checka=false;
        response.forEach(element => {
            
            var brandb = false;
            var displayb = false;
            var weightb = false;
            for(i = 0 ; i < brand.length ; i++){
                if(element.brand.includes(brand[i])){
                    brandb = true;
                }
            }
            for(i = 0 ; i < display.length ; i++ ){
                if(element.display.includes(display[i])){
                    displayb = true;
                }
            }
            for(i = 0 ; i < weight.length ; i++){
                if(weight[i] == 1.49){
                    if(element.weight <= 1.49){
                        weightb = true;
                    }
                }
                if(weight[i] == 1.99){
                    if(element.weight >=1.5 && element.weight <= 1.99){
                        weightb = true;
                    }
                }
                if(weight[i] == 2.49){
                    if(element.weight >=2 && element.weight <= 2.49){
                        weightb = true;
                    }
                }
                if(weight[i] == 2.99){
                    if(element.weight >=2.5 && element.weight <= 2.99){
                        weightb = true;
                    }
                }
                if(weight[i] == 3.49){
                    if(element.weight >=3 && element.weight <= 3.49){
                        weightb = true;
                    }
                }
                if(weight[i] == 3.5){
                    if(element.weight >= 3.5){
                        weightb = true;
                    }
                }
            }
            if(brand.length==0){
                brandb = true;
            }
            if(weight.length==0){
                weightb = true;
            }
            if(display.length==0){
                displayb = true;
            }
            if(brandb == true && displayb == true && weightb == true && parseInt(element.price) <= output.innerHTML ){
                console.log(element.name, element.brand , element.price , element.display , element.weight,output.innerHTML)
                data +="<tr>"+
                "<td>"+element.name+"</td>"+
                "<td>"+element.brand+"</td>"+
                "<td>"+element.price+"</td>"+
                "<td>"+element.display+"</td>"+
                "<td>"+element.weight+"</td></tr>";
                $('#notebook').html(data);
                checka = true;
            }
        });
        if(checka == false){
            alert("Not found!!!");
        }
    });
});