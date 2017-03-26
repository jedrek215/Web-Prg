 $(function() {
            // get current URL path and assign 'active' class
            console.log(window.location.href);
            var pathname = window.location.href;
            $('#menuBar > li > a[href="'+pathname+'"]').parent().addClass('active');
        });
 
  $(function() {
            // get current URL path and assign 'active' class
            console.log(window.location.href);
            var pathname = window.location.href;
            $('.nav.navbar-nav > li > a[href="'+pathname+'"]').parent().addClass('active');
        });
