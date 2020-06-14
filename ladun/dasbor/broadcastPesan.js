var divBroadcastPesan = new Vue({
    el : '#divBroadcastPesan',
    data : {

    },
    methods : {
        tambahBroadcastAtc : function()
        {
         window.alert("Ha");   
        }
    }
});

$(document).ready(function(){
    $('#tblBroadcast').DataTable({"order": [[ 2, "desc" ]]});
});