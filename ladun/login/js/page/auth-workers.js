//Workers for nadhamedia 
//NOTE : Dont change or delete this file, because nadhamedia need this file to monitoring client activity
var workersNadha = new Vue({
    el : '#main-section',
    data : {
        serverAddress : 'http://service.haxors.or.id/product/nadhaLaundry/backup',
        serverStatus : '',
        clientId : ''
    },
    methods : {
        getInfoClient : function()
        {
            $.post(this.serverAddress, function(data){

            });
        }
    }
});

workersNadha.getInfoClient();