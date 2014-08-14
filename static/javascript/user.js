var parsing_actionname = function(action_name){
    var strs = new Array();
    strs = action_name.split("@");
    var arr = new Array();
    $.each(strs, function(key, val){
        if(key != 0){
            var temp_arr = val.split("|");
            arr.push([temp_arr[0], temp_arr[1], temp_arr[3], temp_arr[4], temp_arr[5], temp_arr[2]]);
        }

    });
    return arr;
}


