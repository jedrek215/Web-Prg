$().ready(function() {
    
    $('#loginForm').validate({
        rules: {
            username: {
                dlsuEmail: true
            }
        },
        
    }),
    
    $('#registerForm').validate({
        rules: {
            email: {
                dlsuEmail:true,
                required: true
            },
            regPass: {
                required: true,
                minlength: 7
            },
            confirmPass:{
                required: true,
                equalTo: "#regPass"
            },
            idNumber:{
                required: true,
                digits: true,
                rangelength: [8,8]
            }
        },
        messages: {
            email:{
                dlsuEmail: "Please enter a valid DLSU email address"
            },
            confirmPass:{
                equalTo: "The passwords don't match. Please try again."
            },
            idNumber:{
                digits: "Please enter a numeric value",
                rangelength: "Please enter a valid ID Number with 8 Characters"
            }
        },
        errorElement : 'div',
        errorLabelConainter: {
            firstName: '.errorText'
            
        }
    }),
    jQuery.validator.addMethod("dlsuEmail", function(value, element) {
      // allow any non-whitespace characters as the host part
      return this.optional( element ) || /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@dlsu+\.edu+\.ph/.test( value );
    }, 'Please enter a DLSU email address.');

})