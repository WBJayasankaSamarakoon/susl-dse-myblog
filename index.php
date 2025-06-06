<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BlogWeb</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="styles.css">
</head>
<body class="bg-gray-900 text-gray-100">

<?php 
session_start();
include("includes/header.php"); 


if (!isset($_SESSION['posts'])) {
    $_SESSION['posts'] = [];
}


if (isset($_GET['delete'])) {
    $index = $_GET['delete'];
    if (isset($_SESSION['posts'][$index])) {
        if (isset($_SESSION['posts'][$index]['image_path']) && file_exists($_SESSION['posts'][$index]['image_path'])) {
            unlink($_SESSION['posts'][$index]['image_path']);
        }
        array_splice($_SESSION['posts'], $index, 1);
    }
    header("Location: index.php");
    exit();
}
?>

<section class="relative bg-gray-900 overflow-hidden">
  <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 text-left">
    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-white">
      Welcome to <span class="text-indigo-500">My Blog</span>
    </h1>
    <p class="mt-6 text-lg text-gray-300 max-w-2xl">
      Discover stories, insights, and updates from our community. Dive into articles, moments, and ideas that matter.
    </p>
    <div class="mt-8 flex gap-4">
      <a href="post_form.php" class="bg-white text-gray-900 px-6 py-3 rounded-md text-sm font-medium hover:bg-gray-100">
        Post Your Blog
      </a>
    </div>
  </div>
</section>

<section id="latest-blogs" class="bg-gray-900 py-20">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <h2 class="text-3xl font-extrabold text-white mb-8 text-center">Latest Blogs</h2>

    <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3 pt-5">
      <?php if (empty($_SESSION['posts'])): ?>
        <div class="col-span-3 text-center text-gray-400 py-10">
          No blog posts yet. Be the first to post!
        </div>
      <?php else: ?>
        <?php foreach (array_reverse($_SESSION['posts']) as $index => $post): ?>
          <div class="bg-gray-800 rounded-lg overflow-hidden shadow-lg">
            <?php if (!empty($post['image_path'])): ?>
              <img src="<?php echo $post['image_path']; ?>" alt="<?php echo htmlspecialchars($post['title']); ?>" class="w-full h-48 object-cover">
            <?php else: ?>
              <div class="w-full h-48 bg-gray-700 flex items-center justify-center">
                <span class="text-gray-400">No Image</span>
              </div>
            <?php endif; ?>
            <div class="p-6">
              <h3 class="text-xl font-semibold text-white"><?php echo htmlspecialchars($post['title']); ?></h3>
              <p class="text-gray-400 mt-2"><?php echo htmlspecialchars($post['description']); ?></p>
              <div class="mt-3 text-sm text-indigo-400">
                By <?php echo htmlspecialchars($post['author']); ?>
              </div>
              <div class="mt-4 flex justify-between items-center">
                <a href="view_post.php?index=<?php echo count($_SESSION['posts']) - $index - 1; ?>" class="text-indigo-500 hover:text-indigo-400 font-medium">Read More →</a>
                <a href="index.php?delete=<?php echo count($_SESSION['posts']) - $index - 1; ?>" class="text-red-500 hover:text-red-400 text-sm">Delete</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
</section>

<?php include("includes/footer.php"); ?>

</body>
</html>