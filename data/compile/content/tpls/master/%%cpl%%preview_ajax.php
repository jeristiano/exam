	        	<?php $fid = 0;
 foreach($this->tpl_var['forms'] as $key => $form){ 
 $fid++; ?>
				<div class="control-group">
					<label for="<?php echo $form['id']; ?>" class="control-label"><?php echo $form['title']; ?></label>
					<div class="controls"><?php echo $form['html']; ?></div>
				</div>
				<?php } ?>