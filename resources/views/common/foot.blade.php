  <script type="text/javascript">
    var APP_URL = "{{ url('/') }}";
    var USER_ID = "{{ @Auth::user()->id }}";
  </script>
  <script src="{{ url('public/front/js/jquery.js') }}"></script>
  {!! @$head_code !!}
  <script src="{{ url('public/front/js/bootstrap.js') }}"></script>
  


  <!-- <script src="{{ url('public/front/js/locationpicker.jquery.min.js') }}"></script> -->
   <script src="{{ url('public/front/js/jquery-ui.js') }}"></script>
  <!-- <script src="{{ url('public/front/js/jquery-ui-timepicker-addon.js') }}"></script> -->

  <script src="{{ url('public/front/js/bootbox.min.js') }}"></script>
  <script src="{{ url('public/front/js/front.js') }}"></script>
  @if (Route::current()->uri() == 'reservation/change' || Route::current()->uri() == 'reservation/{id}')
    <script src="{{ url('public/front/js/front.js') }}"></script>
  @endif
  <script src="{{ url('public/front/js/jquery.sidr.js') }}"></script>
  @if (Route::current()->uri() == 'payments/stripe')
    <script src="https://js.stripe.com/v3/"></script>
  @endif

  <script type="text/javascript">
    $(document).ready(function() {
      $('.menubar-toggle').sidr({
        displace: false
      });
      $('.date').datetimepicker({
        timeFormat: "hh:mm tt"
      });
    });

    function closeNav(){
      $.sidr('close', 'sidr');
    }
  </script>
  @stack('scripts')
  
  <script src="{{ url('public/front/js/ninja/ninja-slider.js') }}"></script>
  <script src="{{ url('public/front/js/bootstrap-slider.js') }}"></script>
  <script src="{{ url('public/front/js/selectFx.js') }}"></script>
  <script src="{{ url('public/front/js/admin.js') }}"></script>
  <script type="text/javascript" src='https://maps.google.com/maps/api/js?key={{ @$map_key }}&libraries=places&callback=initMap' async defer></script>

 </body>
</html>