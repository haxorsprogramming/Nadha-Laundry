const urlLoginProses = "login/prosesLogin";
const awalLogin = true;

var loginForm = new Vue({
  el: "#login-app",
  data: {
    userInput: "",
    passwordInput: ""
  },
  methods: {
    klikSaya: function() {
      $.post(
        urlLoginProses,
        { username: this.userInput, password: this.passwordInput },
        function(data) {
          let obj = JSON.parse(data);
          if (obj.jlh > 0) {
            suksesLogin();
          } else {
            gagalLogin();
          }
        }
      );
    }
  }
});

function suksesLogin() {
  iziToast.info({
    title: "Sukses",
    message: "Berhasil login, ke halaman dasbor",
    position: "topCenter",
    timeout: 1000,
    pauseOnHover: false,
    onClosed: function() {
      window.location.assign("dasbor");
    }
  });
}

function gagalLogin() {
  iziToast.error({
    title: "Gagal",
    message: "Username / Password salah!!",
    position: "topCenter",
    timeout: 1000,
    pauseOnHover: false,
    onClosed: function() {
      document.getElementById("txtUsername").value = "";
      document.getElementById("txtPassword").value = "";
      document.getElementById("txtUsername").focus();
    }
  });
}
