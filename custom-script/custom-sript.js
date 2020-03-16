//jquery dataTable
$(document).ready( function () {
    $('#customer').DataTable();
});

getCustomerDetails();

function terminate(){
    return exit();
}
//function that validate form fields

function fieldValidateForm(fname,lname,tname,gender){

    //iniatialize validation that will be used
    let letters = /^[A-Za-z]{3,}$/;

    //firt check if all text field are field before validating each one
    if (fname===''|| lname==='' || tname ==='' || gender===''){
        //pass message to our message class to inform user about the error
        $('.message').html('<div class="alert alert-danger">All field are required!</div>');
        //display error message for three seconds only
        setTimeout(function(){
            $('.message').html('');
        },2000);
        terminate();
        //check if first_name meet our requirement
    }else if(!fname.match(letters)){
        $('.fnameerror').html('<span class="text-danger"><strong>First Name</strong> text Field require only characters and atleast 3 characters must be supplied!</span>');
        setTimeout(function(){
            $('.fnameerror').html('');
        },5000);
        terminate()
        //check if last_name meet our requirement
    }else if(!lname.match(letters)){
        $('.lnameerror').html('<span class="text-danger"><strong>Last Name</strong> text Field require only characters and atleast 3 characters must be supplied!</span>');
        setTimeout(function(){
            $('.lnameerror').html('');
        },5000);
        terminate()
        //check if town_name meet our requirement
    }else if(!tname.match(letters)){
        $('.tnameerror').html('<span class="text-danger"><strong>Town Name</strong> text Field require only characters and atleast 3 characters must be supplied!</span>');
        setTimeout(function(){
            $('.tnameerror').html('');
        },5000);
        terminate()
    }
}

//processing form
$('#customer-form').on('submit', function(test){
     test.preventDefault();
     //receive all input from form when form submitted
    let fname = document.getElementById('fname').value;
    let lname = document.getElementById('lname').value;
    let tname = document.getElementById('tname').value;
    let gender = document.getElementById('gender').value;
    //call function that validate form
        fieldValidateForm(fname,lname,tname,gender);
        /*form meet all our requirements now we can process the form by sending data to our database
        i will use ajax to handle form submition
        */
        $.ajax({
            url:"customer_create.php",
            method:"POST",
            data:{fname:fname,lname:lname,tname:tname,gender:gender},
            beforeSend(){
                //display loader when form is processing
                $('.customerbtn').html('Processing...');
            },
            success:function(response){
                $('.customerbtn').html('Register');
                if (response.indexOf('customersuccess')){
                    $('.message').html('<div class="alert alert-success">Registration Completed successfully!</div>');
                    setTimeout(function(){
                        $('.message').html('');
                        document.location.href ='../index.php';
                    },2000);

                }else if(response.indexOf('customererror')){
                    $('.message').html('<div class="alert alert-danger">Error counted while proccesing your request, Try again!</div>');
                    setTimeout(function(){
                        $('.message').html('');
                    },3000);
                }
            }
        });
});

//function that get customer details for updates
function updateCustomer(button){
    let id = button.id;
    $.ajax({
       url:'customer/customer_details.php',
       method:'GET',
       data:{id:id},
       success:function(response){
           var data = JSON.parse(response);
           $('#customerid').val(id);
           $('#updatefname').val(data['first_name']);
           $('#updatelname').val(data['last_name']);
           $('#updatetname').val(data['town_name']);
           $('#updategender').val(data['genderId']);
           $('.updategenders').html(data['gender_name']);
       }
    });
}

//function that process update form
$(document).on('submit', '#form-update', function(ongeza){
   ongeza.preventDefault();
    //receive all input from form when form submitted
    let id = document.getElementById('customerid').value;
    let fname = document.getElementById('updatefname').value;
    let lname = document.getElementById('updatelname').value;
    let tname = document.getElementById('updatetname').value;
    let gender = document.getElementById('updategender').value;
    //call function that validate form
    fieldValidateForm(fname,lname,tname,gender);
    $.ajax({
       url:'customer/update_customer.php',
       method:'POST',
       data:{id:id,fname:fname, lname:lname, tname:tname, gender:gender},
       beforeSend(){
          $('.updatebtn').html('Processing...');
       } ,
        success:function(response){
            $('.updatebtn').html('Update');
            if(response.indexOf('updatesuccess')){
                $('.message').html('<div class="alert alert-success">Customer details updated successfully!</div>');
                setTimeout(function(){
                    $('.message').html('');
                    $('#update-modal').modal('hide');
                    getCustomerDetails();
                },2000);
            }else if(response.indexOf('updateerror')){
                $('.message').html('<div class="alert alert-danger">Error counted while processing your request,Try again!</div>');
                setTimeout(function(){
                    $('.message').html('');
                    $('#update-modal').modal('hide');
                    getCustomerDetails();
                },2000);
            }
        }
    });
});


//function that display customer details in table
function getCustomerDetails(){
    $.ajax({
       url:'customer/get_customer.php',
       method:'GET',
       success:function(response){
           $('#customer-details').html(response);
       }
    });
}


//function that delete customer details
function deleteCustomer(button){
    let customer_id = button.id;
    $.ajax({
       url:'customer/delete_customer.php',
       method:'GET',
       data:{customer_id:customer_id},
       beforeSend(){
           $('.message2').html('<div class="alert alert-warning">Processing...</div>');
       },
       success:function(response){
           $('.message2').html('');
            if (response.indexOf('cutomerdeleted')){
                getCustomerDetails();
                $('.message2').html('<div class="alert alert-success">Customer Deleted Successfully <span class="fa fa-check fa-fw"></span></div>')
                setTimeout(function(){
                    $('.message2').html('');
                },3000);
            }else if(response.indexOf('customernotdeleted')){
                getCustomerDetails();
                $('.message2').html('<div class="alert alert-success">Error counted while processing your request Try again! <span class="fa fa-cross fa-fw"></span></div>')
                setTimeout(function(){
                    $('.message2').html('');
                },3000);
            }
       }
    });
}