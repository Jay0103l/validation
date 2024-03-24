<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\Rider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRequest;

use Illuminate\Support\Facades\Storage;
use App\Exceptions\InvalidDataException;
use function PHPUnit\Framework\callback;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RiderController extends Controller
{

  public function register(CreateRequest $request){
    $details = Rider::create([
      'name' =>$request->name,
      'email' => $request->email,
      'password' => $request->password,
      'password_confirmation' => $request->password_confirmation,
      'reenterpassword' => $request->reenterpassword,
      'start_date' => $request->start_date,
      'end_date' => $request->end_date,
      'phone_no' => $request->phone_no,
    ]);
    return $details;
    dispatch(new SendEmailJob($details);
    // ->onConnection('notification')->onQueue('mail_worker')

  }

  public function show()
  {
    // DB::table('riders')->orderBy('id')->chunk(4, function($users){
    //     foreach ($users  as $user) {
    //         echo $user->name;
    //     } 
    //     return false;     
    // });
    //  $users = DB::table('riders')->count();
    //    if( DB::table('riders')->where('id', 141)->doesntExist())
    //    {
    //     return false;
    //    }
    // return false;
    //return $users;
    // $jay=DB::table('riders')
    //->avg('phone_no')
    //->sum('phone_no')
    //->select('name','email as user email','phone_no')
    // ->get();
    $user = DB::table('users as u')
      // $role=DB::table('roles as r')
      // ->select('user_id',DB::raw('COUNT(*) as count'))
      // ->groupby('user_id')
      // ->get();
      // return $role;
      // ->join('profile as p','u.id','=','p.user_id')
      // ->leftJoin('profile as p','u.id','=','p.user_id')
      // ->select('u.*','p.profile-name')
      //->rightJoin('profile as p','u.id','=','p.user_id')
      // ->select('p.*','u.name')
      //  ->crossJoin('roles as r')
      //   ->select('u.name','r.role_name')
      // ->where('name','ram')
      // ->orWhere('email','abcabc')
      //->select('name','email')
      // ->whereJsonContains('meta->tags','user')
      // ->whereJsonLength('meta->tags',2)
      //->whereBetween('id',[1,3])
      //->whereNotBetween('id',[1,3])
      //->whereIn('id',[1,2,4])
      //->whereNotIn('id',[1,2,4])
      // ->whereNull('remember_token')
      // ->whereDate('created_at','2024-02-16')
      // ->whereMonth('created_at',02)
      // ->whereDay('created_at',16)
      // ->select('name','email','password','reenterpassword')
      // ->whereColumn('password','reenterpassword')
      // ->inRandomOrder()
      ->inRandomOrder()->first();
    // ->first();
    // ->select('name','email') 

    // ->where('name','jay')
    //  ->select('reenterpassword',DB::raw('COUNT(*) as count'))
    //->groupBy('id')
    //->distinct()
    // ->insert([
    //     'name'=>'jaylathiya',
    //     'email' => 'jaylathiya@example.com',
    //     'password'=>'1234',
    //     'reenterpassword'=>'12334',
    //     'meta'=>'{"tags": ["user", "admin"]}'
    // ]);
    // $user=User::select('name','email','meta')
    // ->where('id','6')
    // // ->withCasts([
    // //    'name'=>'boolean',
    // //    'meta'=>'array'
    // // ])
    // ->get();   

    return $user;
  }

  public function details(Request $request)
  {
    $query = DB::table('riders')->where('name', 'jay')->get();
    Log::info($query);

    $total_record = $query->count();
    return response()->json([
      $total_record,
      $query
    ]);
  }
  // public function me(Request $request)
  // {
  //     return $request->rider();
  // }

  public function collection(Rider $rider)
  {
    // $rider = DB::table('riders')->orderBy('id')
    //   ->chunk(1, function ($person) {
    //     foreach ($person as $rider) {
    //       return $rider;
    //     }
    //   });
    // Rider::chunk(2, function ($person) {
    //   foreach ($person as $rider) {
    //     return $rider;
    //   }
    // });
    // $average=DB::table('users')->select('password','name','email')
    //  $average = collect([
    //     ['foo' => 10],
    //     ['foo' => 10],
    //     ['foo' => 20],
    //     ['foo' => 40]
    //     ]);
    // ->avg('password');
    // $collection = collect([1, 2, 3, 4, 5, 6, 7, 8, 9]);
    // $chunk = $collection->forPage(2, 3);
    // return $chunk;
    // $collection = collect([1, 2, 3, 4, 5, 6, 7]);
    // $chunks = $collection->chunk(4);
    // $chunksArray = $chunks->map(function ($chunk) {
    //   return array_values($chunk->toArray());
    // })->toArray();
    // return $chunksArray;
    // $average = collect([1, 1, 2, 4])->avg();
    // return $average;
    // $collection = collect(['name', 'age']);
    // $combined = $collection->combine(['George', 29]);
    // $collection = collect(['name' => 'taylor', 'framework' => 'laravel']); 
    //$flipped = $collection->flip();
    // $collection->forget('name');/
    // $median = collect([['foo' => 10],['foo' => 10],['foo' => 20],['foo' => 20]])->mode('foo');
    // $collection = collect(['a', 'b', 'c', 'd', 'e', 'f']);
    // $collection=$collection->nth(4);
    // $numbers = collect([1, 2, 3, 4, 5]);
    // $total = $numbers->reduce(
    //   function ($carry, $item) {
    //     return $carry + $item;
    //   },
    //   0
    // ); 

    //return $collection;
  }
  public function helper(Request $request)
  {
    //  $truncated = app_path();
    //  $truncated = Str::limit('The quick brown fox jumps over the lazy dog', 10);
    //     $truncated = Str::mask('jaylathiya1548@gmail.com',  '*',3);
    //     $truncated = Str::plural('children');
    //     $truncated = Str::random(5);
    //     $string = 'Peter Piper picked a peck of pickled peppers.';
    //     $truncated = Str::remove('p', $string);
    //     $string = 'JAY LATHIYA';
    //     $truncated = Str::replace('LATHIYA', 'PATEL', $string);
    //     $truncated = Str::reverse('JAY LATHIYA');
    //     $truncated = Str::slug('Laravel 5 Framework', '-');
    //     $truncated = Str::studly('jay-lathiya');
    //     $truncated = action([RiderController::class, 'details']);
    //     $truncated = action([RiderController::class, 'show']);
    //     $truncated = action([RiderController::class, 'store']);
    //     $truncated = action([RiderController::class, 'show'], ['id' => 1]);
    //     //$password = bcrypt('Jay@1234');
    //     // $env = env('MAIL_USERNAME');
    //     $uri = $request->path();
    //     $uri = $request->url();
    //     $uri = $request->method();
    // $uri = $request->header('X-Header-Name','jay');
    // $ipAddress = $request->ip();
    // // $input = $request->all();
    // $input = $request->collect();
    //     $file = $request->file('welcome');
    $value = $request->cookie('name');
    callback($value);
    //     return response()->json([
    //     $value
    //    ]) ;
    // return response()->download('C:\Users\ja\Downloads','"D:\fig3.png"');
    // return response()
    //       ->json(['name' => 'Abigail', 'state' => 'CA'])
    //       ->withCallback($request->input('callback'));

    // // return response()->json(['data' => 'Your data'])->header('X-Your-Header', 'Your header value');
  }
  public function filestroge(Request $request)
  {
    // $details = Storage::disk('local')->put('demo.txt', 'welcome to local diskk');
    // $details1 = Storage::disk('public')->put('demo.txt', 'welcome to public disk');
    // //Log::info($details);
    // $contents = Storage::get('demo.txt');
    // if (Storage::disk('local')->exists('demo.txt')) {
    //   return 'file is available...';
    // } else {
    //   return 'file is not available...';
    // }
    // if (Storage::missing('demo.txt')) {
    //   return 'file is available...';
    // } else {
    //   return 'file is not available...';
    // }
    // return Storage::download('demo.txt');
    // return Storage::size('demo.txt');
    // return Storage::lastModified('demo.txt');
    // return Storage::url('demo.txt');
    // return $path = Storage::path('demo.txt');
    // $file = Storage::append('demo.txt', 'Jay Lathiya');
    // $file = Storage::copy('demo.txt', 'demo1.txt');
    // $file = Storage::move('demo1.txt', 'demo2.txt');
    $file = Storage::delete('demo2.txt');
    $file = Storage::get('demo2.txt');

    return $file;

    // Log::channel('slack')->info('Something happened!');
    //Log::warning($details);
    // Log::info($details);
    // return $contents;
  }
  public function url(Request $request)
  {
    $post = Rider::find(1);
    // $post = url("/posts/{$post->id}");
    $post = url()->current();
    $post = url()->previous();
    $post = URL::current();
    // return $post;

    $url = action([RiderController::class, 'filestroge']);
    $url = $request->ip();
    return $url;
  }

  public function modelbinding(Rider $rider, $id)
  {
    log::info($rider);
    // return $rider;
  }

  public function exceptionhandler(Rider $rider, $id, Exception $exception)
  {

    $rider = Rider::find($id);
    if (!$rider) {
      throw new InvalidDataException($exception);
    }
    return $rider;
  }
}
