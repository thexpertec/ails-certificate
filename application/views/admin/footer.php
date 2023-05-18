   
   <!-- Jquery Core Js -->
    <script src="<?php echo base_url(); ?>admin_assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url(); ?>admin_assets/plugins/bootstrap/js/bootstrap.js"></script>
    

    <!-- Select Plugin Js -->
    <script src="<?php echo base_url(); ?>admin_assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url(); ?>admin_assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url(); ?>admin_assets/plugins/node-waves/waves.js"></script>

  <!-- Ckeditor -->

    <!-- ChartJs -->
    <script src="<?php echo base_url(); ?>admin_assets/plugins/chartjs/Chart.bundle.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url(); ?>admin_assets/plugins/bootstrap-table/dist/bootstrap-table.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_assets/js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="<?php echo base_url(); ?>admin_assets/js/demo.js"></script>
     <!-- Bootstrap Notify Plugin Js -->
    <script src="<?php echo base_url(); ?>admin_assets/plugins/bootstrap-notify/bootstrap-notify.js"></script>
       <!-- Validation Plugin Js -->
         <script src="<?php echo base_url(); ?>admin_assets/plugins/sweetalert/sweetalert.min.js"></script>
     <script src="<?php echo base_url(); ?>admin_assets/js/pages/ui/dialogs.js"></script>
     

	
    
    
    
    
                      

   
  
    
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
  <script>

 
    $(window).bind("load", function() {
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
}, 4000);
});


var conceptName = $('#page_id').find(":selected").val();
if(conceptName == '1') {

       $(".bcd").remove();
        $(".abc").removeClass('hide');
        //$("#cat_page_names").removeClass('hide');
        $("#cat_page_names").addClass('hide');
    }
    else if (conceptName == '2') {
       
        $(".abc").remove();
       $(".bcd").removeClass('hide');
        //$("#cat_page_names").removeClass('hide');
        $("#cat_page_names").removeClass('hide');
         $("#cat_page_name").addClass('hide');
    }
  $("#weekdays").change(function (e) {
    var checkedDays = $("#weekdays :checkbox").map(function () {
        return +$(this).is(':checked');
    }).get(); 
    
    console.log(checkedDays);
});
$('#toggler').on('click', function () {
    console.log(
        $('#weekdays label').eq(0).button('toggle')
                .find(':checkbox').prop('checked') // toggles t/f
    );
});

$(document).ready(function() {

    $('.js-example-basic-multiple').select2();
    
});
  $('#refresh').on('click', function() {
    location.reload();
      });
    $('#page_id').on('change', function() {
      
       if (this.value == '1')
      {
        $(".bcd").remove();
        $(".abc").removeClass('hide');
        //$("#cat_page_names").removeClass('hide');
        $("#cat_page_names").addClass('hide');
      }
      else if (this.value == '2')
      {
       $(".abc").remove();
       $(".bcd").removeClass('hide');
        //$("#cat_page_names").removeClass('hide');
        $("#cat_page_names").removeClass('hide');
         $("#cat_page_name").addClass('hide');
      }
    });

  
</script>

<script>
function enablemenu (id) {

var info = 'id=' + id;
if(confirm("Are you sure you want to Enable this?"))
{
 $.ajax({
   type: "post",
   url: "<?php echo base_url("admin/active-menu"); ?>/"+id,
   data: info,
   success: function(){
     $("#row_"+id).remove();
 }
});
 }
return false;
}
</script>
<script>
function disablemenu (id) {

var info = 'id=' + id;
if(confirm("Are you sure you want to Disable this?"))
{
 $.ajax({
   type: "post",
   url: "<?php echo base_url("admin/unactive-menu"); ?>/"+id,
   data: info,
   success: function(){
     $("#row_"+id).remove();
 }
});
 }
 
return false;
}
</script>
  <script>
function enablebanner(id) {

var info = 'id=' + id;
if(confirm("Are you sure you want to Active the banner product?"))
{
 $.ajax({
   type: "post",
   url: "<?php echo base_url("admin/active-banner"); ?>/"+id,
   data: info,
   success: function(){
     $("#row_"+id).remove();
 }
});
 }
return false;
}
</script>
<script>
function disablebanner(id) {

var info = 'id=' + id;
if(confirm("Are you sure you want to Deactive the banner product?"))
{
 $.ajax({
   type: "post",
   url: "<?php echo base_url("admin/unactive-banner"); ?>/"+id,
   data: info,
   success: function(){
     $("#row_"+id).remove();
 }
});
 }
 
return false;
}
</script> 


  <script>
function enablecustomer (id) {

var info = 'id=' + id;
if(confirm("Are you sure you want to Enable this?"))
{
 $.ajax({
   type: "post",
   url: "<?php echo base_url("admin/active-product"); ?>/"+id,
   data: info,
   success: function(){
     $("#row_"+id).remove();
 }
});
 }
return false;
}
</script>
<script>
function disablecustomer (id) {

var info = 'id=' + id;
if(confirm("Are you sure you want to Disable this?"))
{
 $.ajax({
   type: "post",
   url: "<?php echo base_url("admin/unactive-product"); ?>/"+id,
   data: info,
   success: function(){
     $("#row_"+id).remove();
 }
});
 }
 
return false;
}
</script> 

<script>
function orderdelivered(id) {

var info = 'id=' + id;
if(confirm("Are you sure you want to Delivered this?"))
{
 $.ajax({
   type: "post",
   url: "<?php echo base_url("admin/delivered-orders"); ?>/"+id,
   data: info,
   success: function(){
     $("#row_"+id).remove();
 }
});
 }
return false;
}
</script>


<script>
function enablemenu (id) {

var info = 'id=' + id;
if(confirm("Are you sure you want to Enable this?"))
{
 $.ajax({
   type: "post",
   url: "<?php echo base_url("admin/active-menu"); ?>/"+id,
   data: info,
   success: function(){
     $("#row_"+id).remove();
 }
});
 }
return false;
}
</script>
<script>
function disablemenu (id) {

var info = 'id=' + id;
if(confirm("Are you sure you want to Disable this?"))
{
 $.ajax({
   type: "post",
   url: "<?php echo base_url("admin/unactive-menu"); ?>/"+id,
   data: info,
   success: function(){
     $("#row_"+id).remove();
 }
});
 }
 
return false;
}
</script>





<script>
function enablecustomers (id) {

var info = 'id=' + id;
if(confirm("Are you sure you want to Enable this?"))
{
 $.ajax({
   type: "post",
   url: "<?php echo base_url("admin/active-customers"); ?>/"+id,
   data: info,
   success: function(){
     $("#row_"+id).remove();
 }
});
 }
return false;
}
</script>
<script>
function disablecustomers (id) {

var info = 'id=' + id;
if(confirm("Are you sure you want to Disable this?"))
{
 $.ajax({
   type: "post",
   url: "<?php echo base_url("admin/unactive-customers"); ?>/"+id,
   data: info,
   success: function(){
     $("#row_"+id).remove();
 }
});
 }
 
return false;
}
</script>

 <script>
function enablehomebanner(id) {

var info = 'id=' + id;
if(confirm("Are you sure you want to Active this?"))
{
 $.ajax({
   type: "post",
   url: "<?php echo base_url("admin/active-home-banner"); ?>/"+id,
   data: info,
   success: function(){
     $("#row_"+id).remove();
 }
});
 }
return false;
}
</script>
<script>
function disablehomebanner(id) {

var info = 'id=' + id;
if(confirm("Are you sure you want to unactive this?"))
{
 $.ajax({
   type: "post",
   url: "<?php echo base_url("admin/unactive-home-banner"); ?>/"+id,
   data: info,
   success: function(){
     $("#row_"+id).remove();
 }
});
 }
 
return false;
}
</script>  


<script>
function enablehomefeature(id) {

var info = 'id=' + id;
if(confirm("Are you sure you want to Active this?"))
{
 $.ajax({
   type: "post",
   url: "<?php echo base_url("admin/active-home-feature"); ?>/"+id,
   data: info,
   success: function(){
     $("#row_"+id).remove();
 }
});
 }
return false;
}
</script>
<script>
function disablehomefeature(id) {

var info = 'id=' + id;
if(confirm("Are you sure you want to unactive this?"))
{
 $.ajax({
   type: "post",
   url: "<?php echo base_url("admin/unactive-home-feature"); ?>/"+id,
   data: info,
   success: function(){
     $("#row_"+id).remove();
 }
});
 }
 
return false;
}
</script>   

</body>

</html>