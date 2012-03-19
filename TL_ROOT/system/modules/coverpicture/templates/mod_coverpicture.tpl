<?php if (!$this->use_as_background): ?>
<div class="<?php echo $this->class; ?> block"<?php echo $this->cssID; ?><?php if ($this->style): ?> style="<?php echo $this->style; ?>"<?php endif; ?>>
	<img src="<?php echo $this->imagepath; ?>" alt="<?php echo $this->pagetitle; ?>" <?php if($this->imgMapID): ?> usemap="#<?php echo $this->imgMapID; ?>"<?php endif; ?> />
	<?php if($this->imgMapID): ?><?php echo $this->imgMap; ?><?php endif; ?>
</div>
<?php endif; ?>