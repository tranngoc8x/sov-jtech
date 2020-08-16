<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>
	<title>Thông tin đơn hàng</title>
	<style>
		table{width: 100%;border-top: 1px solid #ccc;border-left: 1px solid #ccc;}
		table td,table th{border-right: 1px solid #ccc;border-bottom: 1px solid #ccc;padding: 5px 10px;}
		table th{font-weight: bold;padding: 8px 10px;}
		table.infor th{text-align: left}
	</style>
</head>
<body>
	<?php echo $this->fetch('content'); ?>
</body>
</html>