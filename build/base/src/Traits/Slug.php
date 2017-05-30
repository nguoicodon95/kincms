<?php
	namespace App\Build\Base\Traits;

	trait slug {
		public function setSlugAttribute($value)
		{
			if($value) {
				$slug = preg_replace('!\s+!', '-', $value);
			} else {
				$slug = str_slug($this->title);
			}

			return $this->attributes['slug'] = $slug;
		}
	}