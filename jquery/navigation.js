 $(function() {
            // get current URL path and assign 'active' class
            console.log(window.location.pathname);
            var pathname = window.location.pathname;
            $('#menuBar > li > a[href="'+pathname+'"]').parent().addClass('active');
        });
 
  $(function() {
            // get current URL path and assign 'active' class
            console.log(window.location.pathname);
            var pathname = window.location.pathname;
            $('.nav.navbar-nav > li > a[href="'+pathname+'"]').parent().addClass('active');
        });
