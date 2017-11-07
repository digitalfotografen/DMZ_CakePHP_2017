$(document).ready(function(){
    $.get("/scores/top.json", function(data){
        var out = "<ul>";

        if (Array.isArray(data.scores)){
            data.scores.forEach(function(item) {
                out += "<li>" + item.name + " : " + item.points + "</li>";
            });
        }

        out += '</ul>';
        $("#top10").html(out);
    });
});
