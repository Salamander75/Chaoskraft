$(document).ready(function(){
    $("#commandSubmit").click(function(){

        var commands = $.trim($("#commandPost").val());
        var commandsInJson = {};
        commandsInJson.commands = commands;

        $.ajax({type: "POST",
            url: "http://localhost/Chaoscraft/public/submit/command",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: commandsInJson,
            success:function(result){
                alert(result.response);
            }});
    });
});