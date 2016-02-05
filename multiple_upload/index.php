<!DOCTYPE html>
<html lang="en-us">
<head>
	<meta charset="UTF-8">
	<title>HTML5 Multiple File Upload</title>
	<link rel="stylesheet" href="s.css" media="screen">
	<style media="screen"></style>
</head>
<body>
	<form action="processor.php" method="post" enctype="multipart/form-data">
		<input type="file" value="" name="upload[]" multiple>
		<button type="submit">Upload!</button>
	</form>
<script></script>
</body>
</html>