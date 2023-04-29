<?php  
 namespace App\Models; 
  
 use Illuminate\Database\Eloquent\Model; 
  
 Class User extends Model { 
  
 public $timestamps = false; 
  
 protected $primaryKey = 'studid';  
  
 protected $table = 'tblstudent'; 
  
 protected $fillable = [ 
     'studid', 'lastname', 'firstname', 'middlename', 'bday', 'age' 
 ];   
 }