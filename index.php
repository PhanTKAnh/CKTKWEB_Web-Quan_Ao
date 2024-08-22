<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script> 
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Web Bán Quần Áo</title>
</head>
<body>
    <div class="container-fluid">
    <div class="row">
       <?php
            session_start();
            include("admincp/config/config.php");
            include("pages/menu.php");
            include("pages/header.php");
            include("pages/main.php");
            include("pages/footer.php");
       ?>
       </div>
    </div>
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <script type="text/javascript">
        // Show the first tab and hide the rest
        $('#tabs-nav li:first-child').addClass('active');
        $('.tab-content').hide();
        $('.tab-content:first').show();

        // Click function
        $('#tabs-nav li').click(function(){
        $('#tabs-nav li').removeClass('active');
        $(this).addClass('active');
        $('.tab-content').hide();
        
        var activeTab = $(this).find('a').attr('href');
        $(activeTab).fadeIn();
        return false;
        });
            
    </script>
</body>



<!-- <script type="text/javascript">
    $(document).ready(function() {

    var back = $(".prev");
    var next = $(".next");
    var steps = $(".step");

    next.bind("click", function() {
    $.each(steps, function(i) {
        if (!$(steps[i]).hasClass('current') && !$(steps[i]).hasClass('done')) {
        $(steps[i]).addClass('current');
        $(steps[i - 1]).removeClass('current').addClass('done');
        return false;
        }
    })
    });
    back.bind("click", function() {
    $.each(steps, function(i) {
        if ($(steps[i]).hasClass('done') && $(steps[i + 1]).hasClass('current')) {
        $(steps[i + 1]).removeClass('current');
        $(steps[i]).removeClass('done').addClass('current');
        return false;
        }
    })
    });

    })
</script>    -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <!-- <script src="https://www.paypal.com/sdk/js?client-id=ASNA8SvAXQURyuCPWeu5QEnyjV2n6Qm-NV-mPbzt3oE5GZoyXnWuHXV177JiixrUcM5pFKfIB7rjAnKW&currency=USD"></script>
    <script>
        paypal.Buttons ({
            style: {
                layout: 'vertical',
                color: 'blue',
                shape: 'rect',
            },
            //Set up the transaction when a payment button is clicked
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '77.44' //can reference variables or function 
                        }
                    }]
                });
            },
            //Finalize the transaction after payer approval
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(orderData) {
                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    var transaction = orderData.purchase_units[0].payments.captures[0];
                    alert('Transaction'+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');
                });
            }
        }).render('#paypal-button-container');
    </script> -->
</html>