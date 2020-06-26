<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
</head>
<body>
<table>
	  	<thead>
	  		<tr>
	  			<th class="short">No</th>
	  			<th class="normal">Nama Lengkap</th>
	  			<th class="normal">Username</th>
	  			<th class="normal">level</th>
	  		</tr>
	  	</thead>
	  	<tbody>
	  		<?php $no=1; ?>
	  		<?php foreach($database as $user): ?>
	  		  <tr>
	  			<td><?php echo $no; ?></td>
	  			<td><?php echo $user['nama_lengkap']; ?></td>
	  			<td><?php echo $user['username']; ?></td>
	  			<td><?php echo $user['password']; ?></td>
	  		  </tr>
	  		<?php $no++; ?>
	  		<?php endforeach; ?>
	  	</tbody>
	  </table>
</body>
</html>
	