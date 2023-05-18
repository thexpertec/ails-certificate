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
            margin-top: 10;
            margin-bottom: -70;
             font-size: 1.4em;
             font-weight: bold;
        }

        .invoice .invoice-details {
            text-align: right
        }

        .invoice .invoice-details .invoice-id {
            margin-top: 0;
            color: #0d6efd
        }

        .invoice main {
            padding-bottom: 50px
        }

        .invoice main .thanks {
            margin-top: -100px;
            font-size: 2em;
            margin-bottom: 50px
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

        .invoice table {
            width: 100%;
           border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
            border: 1px solid black;

        }

        .invoice table td,
        .invoice table th {
            padding: 2px 5px 2px 5px;
            border: 1px solid black;
            border-bottom: 1px solid black;

            
        }

        .invoice table th {
            white-space: nowrap;
            font-weight: 400;
            font-size: 16px;
            border: 1px solid black;

            
        }

        .invoice table td h3 {
            margin: 0;
            font-weight: 400;
            color: #0d6efd;
            font-size: 1.2em
        }

        .invoice table .qty,
        .invoice table .total,
        .invoice table .unit {
            text-align: left;
            font-size: 0.7em;
            border: 1px solid black;

        }
        .invoice table .text-left {
           
            font-size: 0.7em;
            border: 1px solid black;
            width: 50%;
        }
        
        

        .invoice table .unit {
           border: 1px solid black;
        }

        .invoice table .total {
            border: 1px solid black;
        }

        .invoice table tbody tr:last-child td {
            border: 1px solid #000;
            border-bottom: 1px solid black;
                       margin-left: -330px;

        }

        .invoice table tfoot td {
            background: 0 0;
           border: 1px solid black;
            white-space: nowrap;
            text-align: right;
            padding: 10px 20px;
            font-size: 1.0em;
            border-top: 1px solid #aaa
        }

        .invoice table tfoot tr:first-child td {
           border: 1px solid black;
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0px solid rgba(0, 0, 0, 0);
            border-radius: .25rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
        }

        .invoice table tfoot tr:last-child td {
            color: #0d6efd;
            font-size: 1.4em;
            border-top: 1px solid #000;

        }

        .invoice table tfoot tr td:first-child {
            border: 1px solid #000;
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

                                        
                                        <h2 class="to">CERTIFICATE OF THOROUGH EXAMINATION OF BACKHEO LOADER</h2>
                                        
                                        </div>
                                    </div>
                                   
                                </div>
                                <table>
                                   
                                    <tbody>
                                        <tr>
                                            <td class="text-left" style="font-weight: bold;">Certificate number:</td>
                                            <td class="unit" style="font-weight: bold;"><?php echo $customer['certificate_number']; ?></td>
                                        </tr>
                                        <tr style="border: 1px solid #000;">
                                            <td class="text-left" style="font-weight: bold;">Sticker number:</td>
                                            <td class="unit" style="font-weight: bold;"><?php echo $customer['sticker_number']; ?></td>
                                        </tr>
                                        <tr style="border: 1px solid #000;">
                                            <td class="text-left" style="font-weight: bold;">Reference number:</td>
                                            <td class="unit" style="font-weight: bold;"><?php echo $customer['reference_number']; ?></td>
                                        </tr>
                                       
                                        <tr>
                                            <td colspan="2" style="font-weight: bold;font-size: 0.9em;"><h2>DESCRIPTION: DIESEL POWERED HYDRAULICALLY OPERATED BACKHOE LOADER</h2></td>
                                            
                                        </tr> 

                                        <tr style="border: 1px solid #000;">
                                            <td class="text-left">Name and Address of Owner:</td>
                                            <td class="unit"><?php echo $customer['name_address_owner']; ?></td>
                                        </tr>
                                        <tr style="border: 1px solid #000;">
                                            <td class="text-left">Marker and Date of Manufacture:</td>
                                            <td class="unit"><?php echo $customer['manufacture_date']; ?></td>
                                        </tr>
                                        <tr style="border: 1px solid #000;">
                                            <td class="text-left">Place of Inspection:</td>
                                            <td class="unit"><?php echo $customer['inspection_place']; ?></td>
                                        </tr>
                                        <tr style="border: 1px solid #000;">
                                            <td class="text-left">Ref. Standard:</td>
                                            <td class="unit"><?php echo $customer['ref_standard']; ?></td>
                                        </tr>
                                        <tr style="border: 1px solid #000;">
                                            <td class="text-left">Registration no. And owner no:</td>
                                            <td class="unit" style="font-weight: bold;"><?php echo $customer['registration_number_owner_no']; ?></td>
                                        </tr>
                                        <tr style="border: 1px solid #000;">
                                            <td class="text-left">Model and Serial No:</td>
                                            <td class="unit"><?php echo $customer['model_serial_number']; ?></td>
                                        </tr>
                                        <tr style="border: 1px solid #000;">
                                            <td class="text-left">Manufacturer’s documentation:</td>
                                            <td class="unit"><?php echo $customer['manufacturer_documentation']; ?></td>
                                        </tr>
                                        <tr style="border: 1px solid #000;">
                                            <td class="text-left">Date of Previous Inspection/Cert. No:</td>
                                            <td class="unit"><?php echo $customer['prev_inspection_date_cert_no']; ?></td>
                                        </tr>
                                        <tr style="border: 1px solid #000;">
                                            <td class="text-left">Date of Next Inspection:</td>
                                            <td class="unit" style="font-weight: bold;"><?php echo $customer['next_inspection_date']; ?></td>
                                        </tr>
                                        <tr style="border: 1px solid #000;">
                                            <td class="text-left">Date of Previous Load Test/Cert. No:</td>
                                            <td class="unit"><?php echo $customer['prev_load_test_date_cert_no']; ?></td>
                                        </tr>
                                        <tr style="border: 1px solid #000;">
                                            <td class="text-left">Date of Next Load and Test:</td>
                                            <td class="unit"><?php echo $customer['next_load_test_date']; ?></td>
                                        </tr>
                                        <tr style="border: 1px solid #000;">
                                            <td class="text-left">Availability of Operations Manual in Cab:</td>
                                            <td class="unit"><?php echo $customer['availability_of_operations_manual']; ?></td>
                                        </tr>
                                        <tr style="border: 1px solid #000;">
                                            <td class="text-left">Load Chart in Cab:</td>
                                            <td class="unit"><?php echo $customer['load_chart_in_cab']; ?></td>
                                        </tr>
                                        <tr style="border: 1px solid #000;">
                                            <td class="text-left">Accessory Certificate:</td>
                                            <td class="unit"><?php echo $customer['accessory_certificate']; ?></td>
                                        </tr>
                                        <tr style="border: 1px solid #000;">
                                            <td class="text-left">Availability of Daily Check Report:</td>
                                            <td class="unit"><?php echo $customer['availability_of_daily_check_report']; ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="font-weight: bold;font-size: 0.9em;"><h2>Machine Specs:</h2></td>
                                            
                                        </tr> 

                                        <tr style="border: 1px solid #000;">
                                            <td class="text-left">Engine Serial Number:</td>
                                            <td class="unit"><?php echo $customer['engine_serial_number']; ?></td>
                                        </tr>
                                        <tr style="border: 1px solid #000;">
                                            <td class="text-left">Ground Clearance:</td>
                                            <td class="unit"><?php echo $customer['ground_clearance']; ?></td>
                                        </tr>
                                        <tr style="border: 1px solid #000;">
                                            <td class="text-left">Net power:</td>
                                            <td class="unit"><?php echo $customer['net_power']; ?></td>
                                        </tr>
                                        <tr style="border: 1px solid #000;">
                                            <td class="text-left">Bucket Width:</td>
                                            <td class="unit"><?php echo $customer['bucket_width']; ?></td>
                                        </tr>
                                        <tr style="border: 1px solid #000;">
                                            <td class="text-left">Bucket Capacity:</td>
                                            <td class="unit"><?php echo $customer['bucket_capacity']; ?></td>
                                        </tr>
                                        <tr style="border: 1px solid #000;">
                                            <td class="text-left">Dig Depth Backhoe:</td>
                                            <td class="unit"><?php echo $customer['dig_depth_backhoe']; ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="font-weight: bold;font-size: 0.9em;"><h2 style="font-weight: bold;">Conclusion: <?php echo $customer['conclusion']; ?></h2></td>
                                            
                                        </tr>
                                        <tr style="border: 1px solid #000;">
                                            <td colspan="2" style="font-weight: bold;font-size: 0.9em;"><h2>Declaration: </h2></td>
                                            
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="font-size: 0.9em;"><h2><?php echo $customer['declaration']; ?></h2></td>
                                            
                                        </tr>
                                        <tr style="border: 1px solid #000;">
                                            <td style="font-weight: bold;margin-left:130px;text-align:  center;border: none;font-size: 0.9em;height: 50px;padding-bottom: 80px;">Inspected by: <h2><?php echo $customer['inspected_by']; ?></h2></td>
                                            <td style="font-weight: bold;text-align: center;border: none;font-size: 0.9em;height: 50px;padding-bottom: 80px;">Inspected by: <h2><?php echo $customer['verified_by']; ?></h2></td>
                                            
                                        </tr>  
                                        <tr style="border: 1px solid #000;">
                                            <td class="text-left" style="font-weight: bold;text-align: center;font-size: 0.9em;">Date of Inspection</td>
                                            <td class="unit" style="font-weight: bold;text-align: center;font-size: 0.9em;"><?php echo $customer['inspection_date']; ?></td>
                                        </tr>
                                        
                                    
                                    </tbody>

                                   
                                </table>
                                <h2 style="text-align: left;border: none;font-size: 1.3em;margin-top: -40px;">Note: <?php echo $customer['note']; ?></h2>
                                <div class="col" style="text-align: center;margin-top: 30px;margin-bottom: -30px;">
                                       
                                            <img src="<?php echo base_url(); ?>assets/images/2.jpg" width="800" alt="">
                                      
                                    </div>
                            </main>
                            <footer><?php echo $customer['addresses']; ?></footer>
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