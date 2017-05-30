<?php namespace App\Build\Pages\Models;

use Illuminate\Database\Eloquent\Model;
use App\Build\Base\Traits\Slug;

class Page extends Model
{
	use Slug;

	protected $table = 'pages';

	protected $primaryKey = 'id';

	protected $fillable = [
		'title', 'slug', 'content', 'description', 'keywords', 'status'
	];

}
