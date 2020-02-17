const urlLoginProses = "login/prosesLogin";

var loginForm = new Vue({
  el: "#login-app",
  data: {
    userInput: "",
    passwordInput: "",
    hitung: 0
  },
  methods: {
    klikSaya: function() {
      this.hitung += 1;
      $.post(urlLoginProses,{'username':this.userInput},function(data) {
        console.log(data);
      });
      //  if(this.userInput == ''){
      //   window.alert("Isi woy");
      //   document.getElementById("txtUsername").focus();
      //  }else{

      //  }
    }
  }
});
