<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>Post Title\</th>
					<th>Description</th>
					<th>Category</th>
					<th>Image</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<tr class="odd gradeX">
					<td>Áo thun</td>
					<td>Chất liệu vải nỉ </td>
					<td>Thun</td>
					<td class="center"> 4</td>
					<td><a href="">Edit</a> || <a href="">Delete</a></td>
				</tr>
				
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
