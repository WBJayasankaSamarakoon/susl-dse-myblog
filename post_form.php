<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $author = $_POST['author'] ?? 'Anonymous';
    $description = $_POST['description'] ?? '';
    $content = $_POST['content'] ?? '';
    

    $image_path = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = 'uploads/';
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        
        $file_ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $file_name = uniqid() . '.' . $file_ext;
        $target_path = $upload_dir . $file_name;
        
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
            $image_path = $target_path;
        }
    }
    

    $_SESSION['posts'][] = [
        'title' => $title,
        'author' => $author,
        'description' => $description,
        'content' => $content,
        'image_path' => $image_path,
        'created_at' => date('Y-m-d H:i:s')
    ];
    
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create New Post | BlogWeb</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
</head>
<body class="bg-gray-900 text-gray-100">

<?php include("includes/header.php"); ?>

<section class="py-20">
  <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
    <h2 class="text-3xl font-extrabold text-white mb-8 text-center">Create New Blog Post</h2>
    
    <form action="post_form.php" method="POST" enctype="multipart/form-data" class="space-y-6">
      <div>
        <label for="title" class="block text-sm font-medium text-gray-300">Title</label>
        <input type="text" id="title" name="title" required class="mt-1 block w-full bg-gray-800 border-gray-700 rounded-md shadow-sm text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-2">
      </div>
      
      <div>
        <label for="author" class="block text-sm font-medium text-gray-300">Author Name</label>
        <input type="text" id="author" name="author" class="mt-1 block w-full bg-gray-800 border-gray-700 rounded-md shadow-sm text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-2" placeholder="Anonymous">
      </div>
      
      <div>
        <label for="description" class="block text-sm font-medium text-gray-300">Short Description</label>
        <textarea id="description" name="description" rows="2" required class="mt-1 block w-full bg-gray-800 border-gray-700 rounded-md shadow-sm text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-2"></textarea>
      </div>
      
      <div>
        <label for="content" class="block text-sm font-medium text-gray-300">Content</label>
        <textarea id="content" name="content" rows="6" required class="mt-1 block w-full bg-gray-800 border-gray-700 rounded-md shadow-sm text-white focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-2"></textarea>
      </div>
      
      <div>
        <label for="image" class="block text-sm font-medium text-gray-300">Featured Image</label>
        <input type="file" id="image" name="image" accept="image/*" class="mt-1 block w-full text-white">
      </div>
      
      <div class="flex justify-end gap-4">
        <a href="index.php" class="bg-gray-600 text-white px-6 py-2 rounded-md text-sm font-medium hover:bg-gray-700">
          Cancel
        </a>
        <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-md text-sm font-medium hover:bg-indigo-700">
          Publish Post
        </button>
      </div>
    </form>
  </div>
</section>

<?php include("includes/footer.php"); ?>

</body>
</html>