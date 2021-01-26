Route::get('/myhome/{id}', 'firstcontroller@newhome');  
Route::get('/myhome/{id}/{name}', 'firstcontroller@newhome'); 
Route::get('/title', function () {
    return view('title');
});
Route::get('/category', 'firstcontroller@category'); 

Route::get('/insert' , function(){
	DB::insert('insert into users(name,password,email)values(?,?,?)',['ahmed','456','ahmed@yahoo.com']);
});
Route::get('/insert' , function(){
	DB::insert('insert into posts(title,body,user_id)values(?,?,?)',['relations','this is relation between tables','1']);
});

// Route::get('/insert' , function(){
// 	DB::insert('insert into users(name,password,email)values(?,?,?)',['amr','456','amr@yahoo.com']);
// });
Route::get('/select' , function(){
	$res = DB::select('select * FROM users');
	 foreach ($res as $show) {
   //  echo "<pre>";
	 	// print_r($show -> name );
    return $show -> name ;
	 }
	// echo "<pre>";
	// print_r($res);
});

Route::get('/update' , function(){
	DB::update('update users set name = "arafa", password = "123456" where id = ?',[1]);
});
Route::get('/delete/{id}' , function($id){
	DB::delete('delete from users where id = ?',[$id]);
});
use App\User;

Route::get('/getdata' , function(){

	$user = User::all();
	// $user = User::find(1);
	 // return $user -> name;
	 foreach ($user as $data) {
	 	   return $data -> name;
	 }
	    // return $user;
}); 
Route::get('/find',function(){
  $find = User::orderBy('id','desc')->take(1)->get();
  return $find; 
});
Route::get('/insertnew',function(){
  $insert = new User;
  $insert->name = 'ali';
  $insert->email = 'ali@yahoo.com';
  $insert->password = '123';
  $insert->save(); 
});
// Route::get('/creat',function(){
//  User::creat(['name'=>'samar','email=>samar@yahoo.com','password=>1234']);
// });
Route::get('/creatinsert',function(){
   User::create(['name'=>'ashraf']);
});
Route::get('/creatupdate',function(){
   User::where('id',16)->update(['name'=>'amal']);
});
// Route::get('/creatdelete',function(){
//    User::destroy([16]);
// });
Route::get('/creatdelete',function(){
   User::where('password','123')->delete();
});
use App\Post;
Route::get('/posts',function(){
   $posts = Post::all();
   return $posts;
});

Route::get('/relation/{id}/user',function($id){
   return User::find($id)->showrelation;
});
Route::get('/rel2/{id}/post',function($id){
   return Post::find($id)->showrelation2;
});
Route::get('/relationmany/{id}/user',function($id){
   $many =  User::find($id);
   foreach ($many->relationmany as $count) {
    // return $count->body;   	
    echo $count->body . "<br>";   	
   }
   // return $many;
});
