const urlLoginProses = "login/prosesLogin";
const awalLogin = true;
const usernameF = 'txtUsername';
const passwordF = 'txtPassword';
const loginApp = '#login-app';
const titlePage = 'Nadha Laundry (Aplikasi Manajemen Laundry) - Login Page';

$(document).ready(function(){
  document.getElementById(usernameF).focus();
  document.title = titlePage;
});

var loginForm = new Vue({
  el: loginApp,
  data: {
    userInput: "",
    passwordInput: "",
    developer : "Haxorsprogrammingclub"
  },
  methods: {
    klikSaya: function() {
      if (this.userInput === "" || this.passwordInput === "") {
        isiField();
      } else {
        $.post(urlLoginProses,{username: this.userInput, password: this.passwordInput}, function(data){
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
      clearForm();
    }
  });
}

function isiField() {
  iziToast.warning({
    title: "Isi Field!!",
    message: "Masukkan username & Password",
    position: "topCenter",
    timeout: 2000,
    pauseOnHover: false,
    onClosed: function() {
      clearForm();
    }
  });
}

function clearForm() {
  document.getElementById(usernameF).value = "";
  document.getElementById(passwordF).value = "";
  document.getElementById(usernameF).focus();
}
