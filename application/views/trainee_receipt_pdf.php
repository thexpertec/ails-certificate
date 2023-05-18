<?php if(isset($customer) && !empty($customer))
    { ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Receipt</title>
    <style>
        body {
            margin-top: 20px;
            background-color: #f7f7ff;
        }

        #invoice {
            padding: 0px;
        }

        .invoice {
            position: relative;
            background-color: #FFF;
            min-height: 680px;
            padding: 15px
        }

        .invoice header {
            padding: 10px 0;
            margin-bottom: 20px;
            border-bottom: 2px solid #000
        }

        .invoice .company-details {
            text-align: center;


        }

        .invoice .company-details .name {
            margin-top: -70;
            margin-bottom: 0;
             font-size: 2.8em;
             font-weight: bold;
        }
        .invoice .company-details .names {
            margin-top: 0;
            margin-bottom: 0;
             font-size: 2.3em;
             font-weight: bold;
        }

        .invoice .contacts {
            margin-bottom: 20px
        }

        .invoice .invoice-to {
            text-align: center;
            
        }

        .invoice .invoice-to .to {
            margin-top: 20;
            margin-bottom: -70;
             font-size: 2.4em;
             font-weight: bold;

        }

        .invoice .invoice-to .to1 {
            margin-top: 30;
            margin-bottom: -70;
             font-size: 1.2em;
             font-weight: bold;

        }

        .invoice .invoice-to .to2 {
            margin-top: 30;
            margin-bottom: -70;
             font-size: 2.4em;
             font-weight: bold;

        }

        .invoice .invoice-to .to3 {
            margin-top: 30;
            margin-bottom: -70;
             font-size: 1.6em;
             font-weight: bold;

        }

        .invoice .invoice-to .to4 {
            margin-top: 30;
            margin-bottom: -70;
             font-size: 1.2em;
             font-weight: bold;

        }

        .invoice .invoice-to .to5 {
            margin-top: 15;
            margin-bottom: -70;
             font-size: 1.2em;
             font-weight: bold;

        }

        .invoice .invoice-to .to6 {
            margin-top: 160px;
            border-top: 2px solid #000;
            width: 110px;
            margin-left: 300px;
            padding: 10px;
            margin-bottom: -70;
             font-size: 1.2em;
             font-weight: bold;

        }
        .invoice .invoice-to .to7 {
            margin-top: -1px;
             font-size: 1.2em;
             font-weight: bold;

        }

        .invoice .invoice-to .to8 {
           margin-top: 5;
           text-align: left;
           margin-left: 100px;
            margin-bottom: -70;
             font-size: 1.2em;
             font-weight: bold;

        }

        .invoice .invoice-to .to9 {
           margin-top: -17;
           text-align: right;
           margin-right: 100px;
            margin-bottom: -60;
             font-size: 1.2em;
             font-weight: bold;

        }

       

        .invoice main {
            padding-bottom: 50px
        }

       

        .invoice main .notices {
            padding-left: 6px;
            border-left: 6px solid #0d6efd;
            background: #e7f2ff;
            padding: 10px;
        }

        .invoice main .notices .notice {
            font-size: 1.2em
        }

        
       
        .invoice footer {
            width: 100%;
            text-align: center;
            color: #777;
            border-top: 1px solid #aaa;
            padding: 8px 0
        }

        @media print {
            .invoice {
                font-size: 11px !important;
                overflow: hidden !important
            }

            .invoice footer {
                position: absolute;
                bottom: 10px;
                
            }

            .invoice>div:last-child {
               
            }
        }

        .invoice main .notices {
            padding-left: 6px;
            border-left: 6px solid #0d6efd;
            background: #e7f2ff;
            padding: 10px;
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div id="invoice">
                    
                    <div class="invoice overflow-auto">
                        <div style="min-width: 600px">
                            <header>
                                <div class="row">
                                    <div class="col" style="margin-top: -8px;">
                                      
                                            <img src="<?php echo base_url(); ?>assets/images/6.jpg" width="100" alt="">
                                       
                                    </div>
                                    <div class="col company-details">
                                                <h1 class="name">المؤسسة المتطورة للخدمات والفحص</h1>
                                               <h1 class="names">
                                                Advanced Inspection Services Est.</h1>
                                    </div>
                                    <div class="col" style="float: right; text-align: right; margin-top: -70px;">
                                       
                                            <img src="<?php echo base_url(); ?>assets/images/6.jpg" width="100" alt="">
                                      
                                    </div>
                                </div>
                            </header>
                            <main>
                                <div class="row contacts">
                                    <div class="col invoice-to">

                                        
                                        <h1 class="to">CERTIFICATE</h1>
                                        <h1 class="to">OF</h1>
                                        <h1 class="to">ASSESSMENT</h1>

                                         <h3 class="to1">Certificate no: <?php echo $customer['certificate_no']; ?></h3>
                                         
                                          <h1 class="to2">THIS IS TO CERTIFY THAT</h1>

                                           <h1 class="to3"><?php echo $customer['name_of_trainee']; ?></h1>

                                           <h1 class="to3">I.D no. <?php echo $customer['id_no']; ?></h1>

                                           <h1 class="to3">COMPANY: <?php echo $customer['c_name']; ?></h1>

                                           <h1 class="to4">has successfully passed the assessment course of</h1>
                                           <h1 class="to5"><?php echo $customer['e_course']; ?></h1>

                                           <h1 class="to6"><?php echo $customer['name_of_instructor']; ?></h1>
                                           <h1 class="to7">Instructor</h1>
                                           <?php
                                            $customer['valid_from'] = $customer['valid_from'];
                                            $formattedDate = date('jS F Y', strtotime(str_replace('/', '-', $customer['valid_from'])));

                                            $customer['valid_until'] = $customer['valid_until'];
                                            $endattedDates = date('jS F Y', strtotime(str_replace('/', '-', $customer['valid_until'])));
                                           

                                           
                                           
                                            ?>
                                           <h1 class="to8">Valid From: <?php echo $formattedDate; ?></h1>
                                           
                                           <h1 class="to9">Valid Until: <?php echo $endattedDates; ?></h1>

                                        </div>
                                    </div>
                                   
                                </div>
                               
                                <div class="col" style="text-align: center;margin-top: 30px;margin-bottom: -30px;">
                                       
                                            <img src="<?php echo base_url(); ?>assets/images/2.jpg" width="800" alt="">
                                      
                                    </div>
                            </main>
                            <footer><?php echo $customer['address']; ?></footer>
                        </div>
                        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                        <div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php } ?>