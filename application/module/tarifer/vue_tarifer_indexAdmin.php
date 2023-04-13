    <h2>Consultation des tarifs d'une chambre dans nos hotels</h2>
    <p>Pour modifier un tarif, il faut "tabuler" dans le tableau des tarifs et modifier la valeur de la case.
    	La modification sera automatiquement faite en base de donnnées.</p>

    <table class="table table-striped table-bordered table-hover">
    	<thead>
    		<tr>
    			<th class="devise">€</th>
    			<?php
				foreach ($chCategorie as $catChambre) {
					echo "<th>" . $catChambre . "</th>";
				}
				?>
    		</tr>
    	</thead>
    	<tbody>
    		<!-- 
		* Catégorie d'hôtel
		* Prix de chaque chambre en fonction de la catégorie de la chambre/hôtel
		-->
    		<?php
			foreach ($hoStanding as $numHoc => $nomHoc) {
			?>
    			<tr>
    				<th scope="col"><?= $nomHoc ?></th>
    				<?php
					foreach ($chCategorie as $numChc => $nomChc) {
						$prix = $grilleTarifaire[$numHoc][$numChc];
					?>
    					<td class="tarif" numchc="<?= ($numChc + 1) ?>" numhoc="<?= ($numHoc + 1); ?>" contenteditable="true"><?= $prix ?></td>
    				<?php } ?>
    			</tr>
    		<?php } ?>
    	</tbody>
    </table>