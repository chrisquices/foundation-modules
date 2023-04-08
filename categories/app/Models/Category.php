<?php

namespace App\Models;

use App\Http\Traits\Foundation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Category extends Model implements Auditable {

	use HasFactory;
	use \OwenIt\Auditing\Auditable;
	use Foundation;

	protected $table = 'categories';

	protected $fillable = [];

	protected $guarded = [];

	protected $hidden = [];

	protected $with = [];

	protected $appends = [
		'photo_url',
		'photo_thumbnail_url',
	];

	public function getPhotoUrlAttribute(): string
	{
		return $this->getFileUrl($this->photo);
	}

	public function getPhotoThumbnailUrlAttribute(): string
	{
		return $this->getFileThumbnailUrl($this->photo);
	}

}
