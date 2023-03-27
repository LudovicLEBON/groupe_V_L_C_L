    <h2>hotel</h2>

    <div class="fichehotel">
    	<?php
		foreach ($data as $row) { ?>
    		<article class="arthotel">
    			<h3 class="card"><?= mhe($row['hot_nom']) ?> </h3>
    			<p class="card">
    				Téléphone: <?= mhe($row['hot_telephone']) ?>
    			</p>
    			<p class="card">
    				Adresse: <?= mhe($row['hot_adresse']) ?>
    			</p>
    			<p class="card">
    				<img src="<?= mhe($row['hot_photo']) ?>" alt="">
    			</p>
    			<p class="card">
    				Descriptif: <?= mhe($row['hot_descriptif']) ?>
    			</p>
    			<p class="card">
    				Statut: <?= mhe($row['hot_statut']) ?>
    			</p>
    			<p class="card">
    				Standing: <?= mhe($row['sta_libelle']) ?>
    			</p>


    		</article>



    	<?php } ?>



    </div>