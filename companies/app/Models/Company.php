<?php

namespace App\Models;

use App\Http\Traits\Foundation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Company extends Model implements Auditable {

	use HasFactory;
	use \OwenIt\Auditing\Auditable;
	use Foundation;

	protected $table = 'companies';

	protected $fillable = [];

	protected $guarded = [];

	protected $hidden = [];

	protected $with = [];

	protected $appends = [
		'photo_url',
		'photo_thumbnail_url',
		'banner_url',
		'banner_thumbnail_url',
	];

	public function getPhotoUrlAttribute(): string
	{
		return $this->getFileUrl($this->photo);
	}

	public function getPhotoThumbnailUrlAttribute(): string
	{
		return $this->getFileThumbnailUrl($this->photo);
	}

	public function getBannerUrlAttribute(): string
	{
		return $this->getFileUrl($this->banner);
	}

	public function getBannerThumbnailUrlAttribute(): string
	{
		return $this->getFileThumbnailUrl($this->banner);
	}

}
