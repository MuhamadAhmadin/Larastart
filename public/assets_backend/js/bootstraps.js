 $(document).ready(function(){
      $('#btn-login').click(function(e) {
          e.preventDefault();
          var username = $('#username').val();
          var password = $('#password').val();

          if (username == '' || password == '') {
              Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'Form tidak boleh kosong',
              })
          } else {
              $(this).addClass('Disabled');
              $(this).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>  Loading...');
              $.ajax({
                  type: "POST",
                  url: "functions.php",
                  data: $('#myForm').serialize() + "&key=login",
                  dataType: "json",
                  success: function(data) {
                      console.log('sukses');
                      console.log(data);
                      $('#btn-login').removeClass('Disabled');
                      $('#btn-login').html('Login');
                      if (data.error == 1) {
                          Swal.fire({
                              text: "Akun tidak ditemukan",
                              timer: 1500,
                          });
                      } else {
                          // jika akun ditemukan, cek levelnya
                          switch (data.level) {
                              case '1':
                                  // backend ke admin
                                  Swal.fire({
                                      icon: "success",
                                      title: 'Hai, ' + data.nama,
                                      html: 'Anda berhasil login!',
                                      timer: 2000,
                                      onBeforeOpen: () => {
                                          Swal.showLoading()
                                          timerInterval = setInterval(() => {}, 100)
                                      },
                                      onClose: () => {
                                          clearInterval(timerInterval)
                                      }
                                  }).then((result) => {
                                      if (
                                          /* Read more about handling dismissals below */
                                          result.dismiss === Swal.DismissReason.timer
                                      ) {
                                          console.log('I was closed by the timer')
                                      }
                                  });
                                  setTimeout(function() {
                                      window.location.href = 'admin/';
                                  }, 2100)
                                  break;

                              case '2':
                                  // backend ke staff
                                  Swal.fire({
                                      icon: "success",
                                      title: 'Hai, ' + data.nama,
                                      html: 'Anda berhasil login!',
                                      timer: 2000,
                                      onBeforeOpen: () => {
                                          Swal.showLoading()
                                          timerInterval = setInterval(() => {}, 100)
                                      },
                                      onClose: () => {
                                          clearInterval(timerInterval)
                                      }
                                  }).then((result) => {
                                      if (
                                          /* Read more about handling dismissals below */
                                          result.dismiss === Swal.DismissReason.timer
                                      ) {
                                          console.log('I was closed by the timer')
                                      }
                                  });
                                  setTimeout(function() {
                                      window.location.href = 'staff/';
                                  }, 2100)
                                  break;

                              default:
                                  console.log('Wait a minute... check the switch');
                          }
                      }
                  },
                  error: function(data) {
                      console.log('error');
                      console.log(data.err_msg);
                  },
                  timeout: function(data) {
                      console.log("timeout koneksi terlalu lambat");
                  }
              })
          }
      })
    })