<?php
	require_once("model.php");
	$n = new model();
	$lst2 = $n->getList2();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<p>Bang NV tham gia it nhat mot du an</p>
	<form action="#" method="post">
		<table>
			<tr>
				<th>Ma nv</th>
				<th>Ten nv</th>
				<th>ngay sinh</th>
				<th>gioi tinh</th>
			</tr>
			<?php
				if($lst2->num_rows>0)
					while($item = $lst2->fetch_assoc()) {
			?>
			<tr>
				<td><?php echo($item['manv']); ?></td>
				<td><?php echo($item['tennv']); ?></td>
				<td><?php echo($item['ngaysinh']); ?></td>
				<td><?php echo ($item['gioitinh']); ?></td>
			</tr>
			<?php
				}
			?>
		</table>
	</form>
</body>
</html>