	<!-- *****************************************************************************************************************
	 BLOG CONTENT
	 ***************************************************************************************************************** -->

	 <div class="container mtb" style="padding-top: 25px;">
	 	<div class="row">

	 		<! -- SINGLE POST -->
	 		<div class="col-lg-8">
				<?php foreach ($single as $row): ?>
					<p><img class="img-responsive" src="<?php echo base_url('gambar_posting/'.$row->foto); ?>" alt="<?php echo $row->judul; ?>"></p>
					<a href="<?php echo site_url('pengumuman/single/'.$row->id);?>"><h3 class="ctitle"><?php echo $row->judul; ?></h3></a>
					<p><csmall><?php echo $row->tanggal; ?></csmall> | <csmall2><?php echo $row->nama_depan.' '.$row->nama_belakang; ?></csmall2></p>
					<p>
						<?php echo $row->isi_pengumuman; ?>
					</p>
				<?php endforeach; ?>

		 		<div class="spacing"></div>

			</div><! --/col-lg-8 -->


	 		<! -- SIDEBAR -->
	 		<div class="col-lg-4">
		 		<h4>Search</h4>
		 		<div class="hline"></div>
		 			<p>
		 				<br/>
		 				<input type="text" class="form-control" placeholder="Search something">
		 			</p>

		 		<div class="spacing"></div>

		 		<h4>Pengumuman Terakhir</h4>
		 		<div class="hline"></div>
					<ul class="popular-posts">
						<?php foreach ($pengumuman as $row): ?>
								<li>
									<a href="<?php echo site_url('pengumuman/single/'.$row->id); ?>"><?php echo $row->judul; ?></a>
									<em>Posted on <?php echo $row->tanggal; ?></em>
								</li>
						<?php endforeach; ?>
		      </ul>

	 		</div>
	 	</div><! --/row -->
	 </div><! --/container -->
