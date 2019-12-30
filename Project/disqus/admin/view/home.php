<div class="mt-5 pt-5 container">
			<div class="row">
				<div class="col-md-6 col-sm-12">
					<div class="container">
						<div class="cstm_card_home" id=${args.code}>
		    				<div class="media bg-white p-3 mt-2 ">
					    		<div class="media-body">
					              	<a href="?page=users&limit=<?php echo @$_GET['limit']; ?>&offset=<?php echo @$_GET['offset'] == "" ? 0 : $_GET['offset']; ?>"><p class="mt-0" align="center" style="font-size: 20px;">
					              		Total User
					              	</p></a>
					              	<p align="center" style="font-size: 20px;">
					              		<?php echo @$result["users"]; ?>
					              	</p>
						        </div>
							</div>
   						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-12">
					<div class="container">
						<div class="cstm_card_home" id=${args.code}>
		    				<div class="media bg-white p-3 mt-2 ">
					    		<div class="media-body">
					              	<a href="?page=question&limit=<?php echo @$_GET['limit']; ?>&offset=<?php echo @$_GET['offset'] == "" ? 0 : $_GET['offset']; ?>"><p class="mt-0" align="center" style="font-size: 20px;">
					              		Total Question
					              	</p></a>
					              	<p align="center" style="font-size: 20px;">
					              		<?php echo @$result["question"]; ?>
					              	</p>
						        </div>
							</div>
   						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-12">
					<div class="container">
						<div class="cstm_card_home" id=${args.code}>
		    				<div class="media bg-white p-3 mt-2 ">
					    		<div class="media-body">
					    			<a href="?page=bookmark&limit=<?php echo @$_GET['limit']; ?>&offset=<?php echo @$_GET['offset'] == "" ? 0 : $_GET['offset']; ?>"><p class="mt-0" align="center" style="font-size: 20px;">
					              		Total Bookmark
					              	</p></a>
					              	<p align="center" style="font-size: 20px;">
					              		<?php echo @$result["bookmark"]; ?>
					              	</p>
						        </div>
							</div>
   						</div>
					</div>
				</div>
			</div>
		</div>