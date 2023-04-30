<?php include('header.php'); ?>

<body>
	<?php include('navbar.php'); ?>
	<div class="container">
		<h1 class="page-header text-center">PRODUCTS</h1>
		<ul class="nav nav-tabs">
			<?php
			$sql = "select * from category order by categoryid asc limit 1";
			$fquery = $conn->query($sql);
			$frow = $fquery->fetch_array();
			?>
			<li class="active"><a data-toggle="tab" href="#<?php echo $frow['catname'] ?>"><?php echo $frow['catname'] ?></a></li>
			<?php

			$sql = "select * from category order by categoryid asc";
			$nquery = $conn->query($sql);
			$num = $nquery->num_rows - 1;

			$sql = "select * from category order by categoryid asc limit 1, $num";
			$query = $conn->query($sql);
			while ($row = $query->fetch_array()) {
			?>
				<li><a data-toggle="tab" href="#<?php echo $row['catname'] ?>"><?php echo $row['catname'] ?></a></li>
			<?php
			}
			?>
		</ul>
		<div class="tab-content">
			<?php
			$sql = "select * from category order by categoryid asc limit 1";
			$fquery = $conn->query($sql);
			$ftrow = $fquery->fetch_array();
			?>
			<div id="<?php echo $ftrow['catname']; ?>" class="tab-pane fade in active" style="margin-top:20px;">
				<?php

				$sql = "select * from product where categoryid='" . $ftrow['categoryid'] . "'";
				$pfquery = $conn->query($sql);
				$inc = 4;
				while ($pfrow = $pfquery->fetch_array()) {
					$inc = ($inc == 4) ? 1 : $inc + 1;
					if ($inc == 1) echo "<div class='row'>";
				?>
					<form action="insertcart.php" method="post">
						<div class="col-md-3">
							<div class="panel panel-default">
								<div class="panel-heading text-center">
									<b><?php echo $pfrow['productname']; ?></b>
								</div>
								<div class="panel-body">
									<img src="<?php if (empty($pfrow['photo'])) {
													echo "upload/noimage.jpg";
												} else {
													echo $pfrow['photo'];
												} ?>" height="225px;" width="100%">
								</div>
								<div class="panel-footer text-center">
									&#x0E3F; <?php echo number_format($pfrow['price'], 2); ?>
									<div class="d-grid">
										<div class="input-group input-sm">
											<!-- <?php echo $pfrow['productid']; ?> -->
											<input type="hidden" value="<?php echo $pfrow['productid']; ?>" name="productid" style="">
											<input type="hidden" name="item_name" value="<?php echo $pfrow["productname"]; ?>">
											<input type="hidden" name="item_price" value="<?php echo $pfrow["price"]; ?>">
											<input type="hidden" name="item_id" value="<?php echo $pfrow["productid"]; ?>">
											<span class="input-group-text rounded-0">Quantity</span>
											<input type="number" class="form-control rounded-0 text-center" id="quantity" name="quantity" value="1" required="required">
										</div>
										<input type="submit" name="add" style="margin-top:5px;" class="btn btn-primary btn-sm rounded-0" value="Add to Cart">
									</div>
								</div>
							</div>
						</div>
					</form>
				<?php
					if ($inc == 4) echo "</div>";
				}
				if ($inc == 1) echo "<div class='col-md-3'></div><div class='col-md-3'></div><div class='col-md-3'></div></div>";
				if ($inc == 2) echo "<div class='col-md-3'></div><div class='col-md-3'></div></div>";
				if ($inc == 3) echo "<div class='col-md-3'></div></div>";
				?>
			</div>
			<?php

			$sql = "select * from category order by categoryid asc";
			$tquery = $conn->query($sql);
			$tnum = $tquery->num_rows - 1;

			$sql = "select * from category order by categoryid asc limit 1, $tnum";
			$cquery = $conn->query($sql);
			while ($trow = $cquery->fetch_array()) {
			?>
				<div id="<?php echo $trow['catname']; ?>" class="tab-pane fade" style="margin-top:20px;">
					<?php

					$sql = "select * from product where categoryid='" . $trow['categoryid'] . "'";
					$pquery = $conn->query($sql);
					$inc = 4;
					while ($prow = $pquery->fetch_array()) {
						$inc = ($inc == 4) ? 1 : $inc + 1;
						if ($inc == 1) echo "<div class='row'>";
					?>
						<form action="insertcart.php" method="post">
							<div class="col-md-3">
								<div class="panel panel-default">
									<div class="panel-heading text-center">
										<b><?php echo $prow['productname']; ?></b>
									</div>
									<div class="panel-body">
										<img src="<?php if ($prow['photo'] == '') {
														echo "upload/noimage.jpg";
													} else {
														echo $prow['photo'];
													} ?>" height="225px;" width="100%">
									</div>
									<div class="panel-footer text-center">
										&#x0E3F; <?php echo number_format($prow['price'], 2); ?>
										<div class="d-grid">
											<div class="input-group input-sm">
												<!-- <?php echo $prow['productid']; ?> -->
												<input type="hidden" value="<?php echo $prow['productid']; ?>" name="productid" style="">
												<input type="hidden" name="item_name" value="<?php echo $prow["productname"]; ?>">
												<input type="hidden" name="item_price" value="<?php echo $prow["price"]; ?>">
												<input type="hidden" name="item_id" value="<?php echo $prow["productid"]; ?>">
												<span class="input-group-text rounded-0">Quantity</span>
												<input type="number" class="form-control rounded-0 text-center" id="quantity" name="quantity" value="1" required="required">
											</div>
											<input type="submit" name="add" style="margin-top:5px;" class="btn btn-primary btn-sm rounded-0" value="Add to Cart">
										</div>
									</div>
								</div>
							</div>
						</form>
					<?php
						if ($inc == 4) echo "</div>";
					}
					if ($inc == 1) echo "<div class='col-md-3'></div><div class='col-md-3'></div><div class='col-md-3'></div></div>";
					if ($inc == 2) echo "<div class='col-md-3'></div><div class='col-md-3'></div></div>";
					if ($inc == 3) echo "<div class='col-md-3'></div></div>";
					?>
				</div>
			<?php
			}
			?>
		</div>

	</div>
</body>

</html>