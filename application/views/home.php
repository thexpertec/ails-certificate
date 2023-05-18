<!DOCTYPE html>
<html>
<head>
	<title>Certificate</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  

	<!-- Custom CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
</head>
<body>
	<header>
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<img src="<?php echo base_url(); ?>assets/images/logo.png" alt="Logo">
				</div>
				<div class="col-md-6 text-right btn-logins">
					<a href="#" class="btn btn-primary">Login</a>
				</div>
			</div>
		</div>
	</header>
	<main>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					
					<label>Search Certificate Number To View & Download The PDF .</label>
					<input type="text" class="form-control" placeholder="Search" id="search-input">
				

					<br>
					<table class="table table-bordered" id="results-table">
						<thead>
							<tr>
								<th>Certificate No.</th>
								<th>Download Certificate</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td></td>
								<td></td>
							</tr>
							
						</tbody>
					</table>
				</div>	
					<div id="search-error"></div>
				</div>
			</div>
		</div>
	</main>
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<ul class="social-icons">
						<li><a href="#" class="fa fa-facebook"></a></li>
						<li><a href="#" class="fa fa-twitter"></a></li>
						<li><a href="#" class="fa fa-instagram"></a></li>
						<li><a href="#" class="fa fa-youtube"></a></li>
					</ul>
				</div>
				<div class="col-md-6 text-right">
					<p>P.O. Box: 2835, P.C.: 130, Sultanate of Oman, Tel.: 24035800, Mobile: 99045180 | P.O. Box: ۲۸۳٥, P.C.: ۱۳۰, Sultanate of Oman, Tel.: ۲٤۰۳٥۸۰۰, Mobile: ۹۹۰٤٥۱۸۰
E-mail: info@ais-om.com, www.ais-om.com, Tax Card No. 8136517, VATIN: OM1100025395</p>
				</div>
			</div>
		</div>
	</footer>
	<!-- jQuery -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
    // Show default text in the search input field
    $('#search-input').attr('placeholder', 'Search the Certificate No.');
    // Show default text in the search error div
    $('#search-error').text('Search the Certificate No.');
    
    $('#search-input').on('input', function() {
        var query = $(this).val().trim();
        if (query.length > 0) {
            $.ajax({
                url: '<?php echo base_url("receipt/search_data"); ?>',
                type: 'post',
                dataType: 'json',
                data: { query: query },
                success: function(data) {
                    if (data.length > 0) {
                        var tableHtml = '';
                        $.each(data, function(index, row) {
                            tableHtml += '<tr>';
                            tableHtml += '<td>' + row.certificate_number + '</td>';
                            tableHtml += '<td><a href="' + '<?php echo base_url() ?>receipt/print/' + row.certificate_number + '" style="color: white; background-color: blue; padding: 5px 10px;font-size: 14px; border-radius: 20px;" download="certificate.pdf">Certificate Download</a></td>';
                            tableHtml += '</tr>';
                        });
                        $('#results-table tbody').html(tableHtml);
                        $('#search-error').empty();
                    } else {
                        $('#results-table tbody').empty();
                        $('#search-error').text('Certificate not found');
                    }
                },
                error: function(xhr, status, error) {
                    console.log('Error: ' + error);
                }
            });
        } else {
            $('#results-table tbody').empty();
            $('#search-error').text('Search the Certificate No.');
        }
    });
});




</script>
</body>
</html>
