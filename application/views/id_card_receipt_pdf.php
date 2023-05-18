<?php if(isset($customer) && !empty($customer))
    { ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>ID Card Front</title>
 
</head>
<style type="text/css">
  @import url('https://fonts.googleapis.com/css2?family=Roboto');

* {
  box-sizing: border-box;
}

/* Base Style */
body {
  max-width: 500px;
  margin: auto;
  font-family: 'Roboto', sans-serif;

}

/* Utility Classes */
.wrapper {
  padding: 10px;

}
.crimson {
  color: crimson;
}
.bold {
  font-weight: bold;
}
.container {
  text-align: center;
}
.card {
  padding: 10px 10px 0 10px;
  box-shadow: 0 2px 8px 0 rgba(0, 0, 0, 0.2);
  transition: 0.3s;
  position: relative;
  border-radius: 10px;
    background-color: #f2fafd;

}
.disclaimer {
  font-size: 12px !important;
}
a {
  text-decoration: none;
  color: crimson;
}

.center {
  text-align: center;
}
.sky {
  color: #0077b5;
}



/* ID Card */
#id-card {
  margin-top: 1px;
}
#id-card p {
  margin: 0px;
}
#id-card .lead {
  font-size: 0.9rem;
  margin-top: -33px; 
  font-weight: bold;
}
#id-card .bcc { 
border-bottom:1px solid #000; 
}
#id-card .leads {
  font-size: 0.7rem;
  margin-top: -3px; 
}
#id-card .details {
  font-weight: bold;
}
#id-card .logo {
  position: absolute;
  left: 6px;
}
.bcc .logos {
margin-left: -300px;  
}

#id-card .mugshot {
  width: min-content;
}
#id-card .box {
  display: flex;
  justify-content: flex-end;
  margin-top: 40px;
}
#id-card .details {
  flex-grow: 2;
}
footer {
  text-align: center;
  font-size: 0.7rem;
}
footer p {
  /* margin-top: 20px; */
  color: black;
}


/* Section: Read Me */







</style>
  <body>
    <div class="wrapper">
    <section id="id-wrapper">
        <div id="id-card" class="card">
          <div class="bcc">
          <img class="logo" src="<?php echo base_url(); ?>assets/images/6.jpg" width="45" />

          <div class="container">
            <p class="lead bold">Advanced Inspection Services Est.</p>

            <p class="leads ">Muscat Oman</p>
          </div>

          <div style="float: right; text-align: right; margin-top: -33px;">
                  <img src="<?php echo base_url(); ?>assets/images/6.jpg" width="45" alt="">
               </div> 
        </div>
        <div class="bcc">
        <h1 style="text-align: center;font-size: 0.7rem;margin-top: 1px;">Note: This is not a driving license.</h1>
         <h1 style="text-align: left;font-size: 0.7rem;margin-top: 1px;">Name: <span style="font-weight: bold;"><?php echo $customer['name_of_trainee']; ?></span></h1>
         <h1 style="text-align: left;font-size: 0.7rem;margin-top: 1px;width: 240px;">Co: <span style="font-weight: bold;"><?php echo $customer['c_name']; ?></span></h1>
         <h1 style="float:left;text-align: right;font-size: 0.7rem;margin-top: -25px;">I.D. No.: <span style="font-weight: bold;"><?php echo $customer['id_no']; ?></span></h1>
         <h1 style="float:left;text-align: left;font-size: 0.7rem;margin-top: 5px;">Certificate No: <span style="font-weight: bold;"><?php echo $customer['certificate_no']; ?></span></h1>
         <h1 style="float:left;text-align: right;font-size: 0.7rem;margin-top: -20px;">Position: <span style="font-weight: bold;"><?php echo $customer['p_position']; ?></span></h1>
         </div>
           
              <img style="float:right;text-align: right;font-size: 0.7rem;margin-top: -1px;margin-right:-8px; "
                id="id-card-mugshot"
                width="110"
                height="110"
                class="mugshot-img"
                src="<?php echo base_url(); ?>assets/img/<?php echo $customer['userimage']; ?>"
                alt="id-image"
              />

           
        <h1 style="text-align: center;font-size: 0.7rem;font-style: italic;padding: 7px;">The Holder of this card has successfull passed
        the Backhoe Loader Operator Test</h1>
        <div style="float:left;margin-top: -87px;border-bottom:1px solid #000;width: 245px;"></div>
        <br clear="all">
         <h1 style="float:left;text-align:left;margin-top: -10px;font-size: 0.7rem;">Date of Issue: <span style="font-weight: bold;"><?php echo $customer['date_of_issue']; ?></span></h1>
          <img style="float:left;text-align: right;font-size: 0.7rem;margin-top: -25px;margin-left: 210px;" src="<?php echo base_url(); ?>assets/images/6.jpg" width="35" alt="">
           
         <h1 style="float:left;text-align:left;margin-top: 2px;font-size: 0.7rem;">Date of Expiry: <span style="font-weight: bold;"><?php echo $customer['date_of_expiry']; ?></span></h1>
         <h1 style="float:left;text-align:left;margin-top: 2px;font-size: 0.7rem;">Examiner: <span style="font-weight: bold;"><?php echo $customer['name_of_instructor']; ?></span></h1>
         
         
         </div>
          </div>

      
  
         
        </div>
      </section>
      </div>
      <br clear="all">
      <div class="wrapper">
      <section id="id-wrapper" >
        <div id="id-card" class="card" >
          
        <div class="bcc" style="border-bottom:none !important ;">
        <h1 style="text-align: center;font-size: 0.7rem;margin-top: 1px;margin-bottom: -1px;">Note:</h1>
         <h1 style="text-align: center;font-size: 0.7rem;padding: 0px 10px;">The holder of this card should display the card
         at all times when attending the categorized duty (Non PDO)</h1>
         <h1 style="text-align: center;font-size: 0.6rem;padding: 0px 10px;color: #823544;margin-bottom: 2px;">To verify the accuracy and validity of this card, please contact</h1>
         <h1 style="text-align: center;font-size: 0.7rem;padding: 0px 10px;font-weight: bold;margin-bottom: 2px;">Advanced Inspection Services Est.</h1>
         <h1 style="text-align: center;font-size: 0.6rem;padding: 0px 35px 0px 45px;margin-bottom: 3px;line-height: 15px;"><?php echo $customer['address']; ?> Mob.: <?php echo $customer['phone']; ?> <span style="color: #5ba8e9;">E-mail: info@ais-om.com</span></h1>
         <h1 style="text-align: center;font-size: 0.7rem;color: #30468d;margin-bottom: 3px;">Or scan below QR Code</h1>
         <div style="margin-bottom: 8px;">
           <img style="float: left; text-align: center;margin-left: 38px;" src="<?php echo base_url(); ?>assets/images/7.jpg" width="50" />
          <img style="float: left; text-align: center;margin-left: 65px;" src="<?php echo base_url(); ?>assets/images/qr.jpg" width="40" />
          <img style="float: left; text-align: center;margin-left: 68px;" src="<?php echo base_url(); ?>assets/images/7.jpg" width="50" />
          </div>
          <h1 style="text-align: center;font-size: 0.7rem;padding: 0px 0px;">We hereby declare that the holder of this card was examined in accordance with applicable standards, and that results were satisfactory at the time of examination. AIS Est. accpets no liability for any errors comitted by the holder of this card while attending the categorized duty/work.</h1>
         </div>
           
           

       
         </div>
          </div>

      
  
         
        </div>
      </section>
     
    </div>


  </body>
</html>
<?php } ?>