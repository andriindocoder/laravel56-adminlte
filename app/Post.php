<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use GrahamCampbell\Markdown\Facades\Markdown;

class Post extends Model
{
	protected $dates = ['published_at'];

	protected $fillable = ['category_id'];

    public function getImageUrlAttribute($value){

    	$imageUrl = "";
    	if(!is_null($this->image)){
    		$imageUrl = $this->image;
    	}else{
    		$imageUrl = "";
    	}

    	return $imageUrl;
    }

    public function author(){
		return $this->belongsTo(User::class);
	}

	public function category(){
	    return $this->belongsTo(Category::class);
	}

	public function getDateAttribute($value){
		return is_null($this->published_at) ? '' : $this->published_at->diffForHumans();
	}

	public function getBodyHtmlAttribute($value){
		return $this->body ? Markdown::convertToHtml(e($this->body)) : NULL ;
	}

	public function getExcerptHtmlAttribute($value){
		return $this->excerpt ? Markdown::convertToHtml(e($this->excerpt)) : NULL ;
	}

	public function scopeLatestFirst($query){
		return $query->orderBy('created_at', 'desc');
	}

	public function scopePublished($query){
		return $query->where("published_at", "<=", Carbon::now());
	}
}
