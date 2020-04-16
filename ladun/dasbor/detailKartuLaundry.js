var divDetailKartuLaundry = new Vue({
    el : '#divDetailKartuLaundry',
    data : {

    },
    methods : {
        bayarAtc : function(){
            window.alert("halo");
        },
        keLaundryRoomAtc : function(kdService){
            window.alert(kdService);
        },
        pickUpAtc : function(kdService){
            $.post('kartuLaundry/pickUpCucian',{'kdService':kdService}, function(data){
                let obj = JSON.parse(data);
                console.log(obj);
            });
        }
    }
});