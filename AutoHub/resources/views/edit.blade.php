<form method="POST" action="{{ route('posts.update', ['id' => $post->id]) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label for="title">Title</label><br>
    <input type="text" id="title" name="title" value="{{$post->title}}"><br>

    <label for="brand">Brand</label><br>
    <input type="text" id="brand" name="brand" value="{{$post->brand}}"><br>

    <label for="model">Model</label><br>
    <input type="text" id="model" name="model" value="{{$post->model}}"><br>

    <label for="model_year">Model year</label><br>
    <input type="number" id="model_year" name="model_year" min="1900" max="2024" step="1" value="{{$post->model_year}}" /><br> <!-- CHANGE TO YEAR PICKER WITH JS-->

    <label for="description">Description</label><br>
    <textarea id="description" name="description" rows="4" cols="50">{{$post->description}}</textarea>

    <label for="car_img">Picture</label>
    <input type="file" name="car_img" id="car_img">
    <br>
    <input type="submit" value="Update">
</form>