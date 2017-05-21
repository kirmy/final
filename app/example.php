php artisan storage:link

Storage::disk('local')->put('file.txt', 'Contents');
use Illuminate\Support\Facades\Storage;

Storage::put('avatars/1', $fileContents);

$contents = Storage::get('file.jpg');
$exists = Storage::disk('s3')->exists('file.jpg');

<img src="pic_mountain.jpg" alt="Mountain View" style="width:304px;height:228px;">

'public' => [
    'driver' => 'local',
    'root' => storage_path('app/public'),
    'url' => env('APP_URL').'/storage',
    'visibility' => 'public',
],

use Illuminate\Support\Facades\Storage;

Storage::put('file.jpg', $contents);

Storage::put('file.jpg', $resource);

$path = $request->file('avatar')->store('avatars');
$path = Storage::putFile('avatars', $request->file('avatar'));
$path = $request->file('avatar')->storeAs('avatars', $request->user()->id);
$path = $request->file('avatar')->store('avatars/'.$request->user()->id, 's3');

$path = $request->photo->storeAs('images', 'filename.jpg');
$path = $request->photo->storeAs('images', 'filename.jpg', 's3');

Storage::delete(['file1.jpg', 'file2.jpg']);

$file = $request->file('photo');

$file = $request->photo;
if ($request->hasFile('photo')) {
    //
}
if ($request->file('photo')->isValid()) {
    //
}
$path = $request->photo->path();
$extension = $request->photo->extension();

$imageName = $product->id . '.' . $request->file('image')->getClientOriginalExtension();

$request->file('image')->move( base_path() . '/public/images/catalog/', $imageName );

return \Redirect::route('admin.products.edit', array($product->id))->with('message', 'Product added!');