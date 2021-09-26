    </div>
 <style>
      .error {
        color: red;
      }
    </style>
    <script src="../assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="../assets/lib/jquery-ui/js/datepicker.js" type="text/javascript"></script>
    <script src="../assets/lib/bootstrap/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="../assets/lib/perfect-scrollbar/perfect-scrollbar.min.js" type="text/javascript"></script>
    <script src="../assets/lib/moment/min/moment.min.js" type="text/javascript"></script>
    <script src="../assets/lib/peity/jquery.peity.min.js" type="text/javascript"></script>
    <script src="../assets/lib/rickshaw/vendor/d3.min.js" type="text/javascript"></script>
    <script src="../assets/lib/rickshaw/vendor/d3.layout.min.js" type="text/javascript"></script>
    <script src="../assets/lib/rickshaw/rickshaw.min.js" type="text/javascript"></script>
    <script src="../assets/lib/jquery.flot/jquery.flot.js" type="text/javascript"></script>
    <script src="../assets/lib/jquery.flot/jquery.flot.resize.js" type="text/javascript"></script>
    <script src="../assets/lib/flot-spline/js/jquery.flot.spline.min.js" type="text/javascript"></script>
    <script src="../assets/lib/jquery-sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <script src="../assets/lib/echarts/echarts.min.js" type="text/javascript"></script>
    <script src="../assets/lib/highlightjs/highlight.pack.min.js" type="text/javascript"></script>
    <script src="../assets/lib/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script src="../assets/lib/gmaps/gmaps.min.js" type="text/javascript"></script>
    <script src="../assets/js/bracket.js" type="text/javascript"></script>
    <script src="../assets/js/map.shiftworker.js" type="text/javascript"></script>
    <script src="../assets/js/ResizeSensor.js" type="text/javascript"></script>
    <script src="../assets/js/dashboard.js" type="text/javascript"></script>
    <script src="../assets/lib/jquery/jquery.validate.min.js" type="text/javascript"></script>

    <script>
      $(document).ready(function(){
        $("#ModalCovid19").modal('show');
      });
    </script>
    
    <script>
      $(document).ready(function() {
        $('#formpemohon').validate({
          rules: {
            bk_kasus: {
              file: true,
              max: 10240
            }
          },
          messages: {
            jd_kasus: {
              required: 'Judul kasus harus diisi.'
            },
            tgl_kasus: {
              required: 'Tanggal kasus harus diisi.',
              max: 'Foto maksimal 1 MB.'
            },
            bk_kasus: {
              required: 'Bukti kasus harus diisi.'
            },
            dk_kasus: {
              required: 'Deskrpsi kasus harus diisi.'
            }

          },
          submitHandler: function(form) {
            form.submit();
          }
        });
      });
    </script>
    <!-- Javascript untuk popup modal foto bukti-->
    <script type="text/javascript">
      $(document).ready(function() {
        $(".btnfoto").click(function(e) {
          var m = $(this).attr("id");
          $.ajax({
            url: "fotobuktikasus.php",
            type: "GET",
            data: {
              id_kasus: m,
            },
            success: function(ajaxData) {
              $("#Modalbukti").html(ajaxData);
              $("#Modalbukti").modal('show', {
                backdrop: 'true'
              });
            }
          });
        });
      });
    </script>


    <!-- Javascript untuk popup modal deskrpsi-->
    <script type="text/javascript">
      $(document).ready(function() {
        $(".btndeskrip").click(function(e) {
          var m = $(this).attr("id");
          $.ajax({
            url: "deskripsikasus.php",
            type: "GET",
            data: {
              id_kasus: m,
            },
            success: function(ajaxData) {
              $("#Modalbukti").html(ajaxData);
              $("#Modalbukti").modal('show', {
                backdrop: 'true'
              });
            }
          });
        });
      });
    </script>


    <script>
      $(function() {
        'use strict'


        $(window).resize(function() {
          minimizeMenu();
        });

        minimizeMenu();

        function minimizeMenu() {
          if (window.matchMedia('(min-width: 992px)').matches && window.matchMedia('(max-width: 1299px)').matches) {
            // show only the icons and hide left menu label by default
            $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');
            $('body').addClass('collapsed-menu');
            $('.show-sub + .br-menu-sub').slideUp();
          } else if (window.matchMedia('(min-width: 1300px)').matches && !$('body').hasClass('collapsed-menu')) {
            $('.menu-item-label,.menu-item-arrow').removeClass('op-lg-0-force d-lg-none');
            $('body').removeClass('collapsed-menu');
            $('.show-sub + .br-menu-sub').slideDown();
          }
        }
      });
    </script>

    <script>
      $(function() {

        'use strict';

        // Datepicker
        $('.fc-datepicker').datepicker({
          showOtherMonths: true,
          selectOtherMonths: true
        });

      });
    </script>

    <script>
      $(function() {

        'use strict';

        $('.inputfile').each(function() {
          var $input = $(this),
            $label = $input.next('label'),
            labelVal = $label.html();

          $input.on('change', function(e) {
            var fileName = '';

            if (this.files && this.files.length > 1)
              fileName = (this.getAttribute('data-multiple-caption') || '').replace('{count}', this.files.length);
            else if (e.target.value)
              fileName = e.target.value.split('\\').pop();

            if (fileName)
              $label.find('span').html(fileName);
            else
              $label.html(labelVal);
          });

          // Firefox bug fix
          $input
            .on('focus', function() {
              $input.addClass('has-focus');
            })
            .on('blur', function() {
              $input.removeClass('has-focus');
            });
        });

      });
    </script>

    </body>

    </html>